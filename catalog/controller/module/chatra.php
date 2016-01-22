<?php
class ControllerModuleChatra extends Controller{

    public function index($settings) {
				$data['widget_code'] = html_entity_decode($settings['widget_code']);
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/chatra.tpl')) {
            return $this->load->view($this->config->get('config_template') . '/template/module/chatra.tpl', $data);
        } else {
            return $this->load->view('default/template/module/chatra.tpl', $data);
        }
    }
}