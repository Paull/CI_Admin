<?php defined('BASEPATH') || exit('No direct script access allowed');

class Events extends CI_Controller {
    
	public function ajax_create()
	{
        if($this->input->is_ajax_request() && $this->input->post())
        {
            $this->load->model('m_calendar');
            $data = $this->input->post();
            $this->m_calendar->insert_event($data);
            $data['id'] = $this->db->insert_id();
            $this->output->set_output(json_encode($data));
            // echo json_encode($data);
        }
	}
    
    public function ajax_load()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model('m_calendar');
            // $data = $this->m_calendar->where(array('uid'=>$this->session->userdata('uid')))->get()->result_array();
            $data = $this->m_calendar->join('member', 'member.id=calendar.uid', 'left')->select('calendar.*, member.avatar')->get()->result_array();

            foreach($data as $key=>$value)
            {
                if($this->session->userdata('uid') == $value['uid'])
                {
                    $data[$key]['editable'] = TRUE;
                }
                else
                {
                    $data[$key]['editable'] = FALSE;
                }
            }
            
            $this->output->set_output(json_encode($data));
        }
    }
    
    public function ajax_load_admin()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model('m_calendar');
            
            $uid = intval($this->uri->segment(3));
            if($uid)
            {
                $data = $this->m_calendar->where(array('uid'=>$uid))->get()->result_array();
                
                $this->output->set_output(json_encode($data));
            }
        }
    }
    
    public function ajax_update()
    {
        //TODO:以下方法均未验证操作者
        if($this->input->is_ajax_request() && $this->input->post())
        {
            $this->load->model('m_calendar');
            switch($this->input->post('action'))
            {
                case 'drop':
                    $ret = $this->m_calendar->update_by_drop($this->input->post('id', TRUE), 86400*$this->input->post('dayDelta', TRUE) + 60*$this->input->post('minuteDelta', TRUE), $this->input->post('allDay', TRUE));
                    // echo json_encode($ret);
                    $this->output->set_output(json_encode($ret));
                    break;
                case 'resize':
                    $ret = $this->m_calendar->update_by_resize($this->input->post('id', TRUE), 86400*$this->input->post('dayDelta', TRUE) + 60*$this->input->post('minuteDelta', TRUE));
                    $this->output->set_output(json_encode($ret));
                    break;
                case 'modify':
                    $data = $this->input->post();
                    unset($data['action']);
                    $ret = $this->m_calendar->modify($data);
                    $this->output->set_output(json_encode($ret));
                    break;
                case 'remove':
                    $data = $this->input->post();
                    unset($data['action']);
                    $ret = $this->m_calendar->where('id', $data['id'])->delete();
                    $this->output->set_output(json_encode($ret));
                    break;
            }
        }
    }
    
}

/* End of file Event.php */
/* Location: ./application/controllers/api/Event.php */
