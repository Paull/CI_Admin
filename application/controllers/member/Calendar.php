<?php defined('BASEPATH') || exit('No direct script access allowed');

class Calendar extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    //行程管理
    public function index()
    {
        $this->_data['template']['title'] = '行程管理';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);

        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/jquery.fullcalendar/fullcalendar.min.js';
        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/bootstrap.colorpicker/bootstrap-colorpicker.js';

        $this->_data['template']['javascript'] .= "var fc_color = '{$this->_data['self']['fc_color']}';\n
jQuery('#fc_color').parent().colorpicker().on('changeColor', function(ev){fc_color = ev.color.toHex();jQuery('#fc_color').val(ev.color.toHex());});
var calendar = jQuery('#calendar').fullCalendar({
    events: '".base_url('api/events/ajax_load')."',
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    buttonText: {
        prev: '&lt;',
        next: '&gt;',
        prevYear: '&nbsp;&lt;&lt;&nbsp;',
        nextYear: '&nbsp;&gt;&gt;&nbsp;',
        today: '今天',
        month: '月',
        week: '周',
        day: '日'
    },
    titleFormat: {
        month: 'yyyy年MMMM',
        week: \"yyyy年MMMMd日{ '&#8212;' [yyyy年][MMMM]d日}\",
        day: 'yyyy年MMMMd日, dddd'
    },
    columnFormat: {
        month: 'ddd',
        week: 'M/d dddd',
        day: 'M/d dddd'
    },
    monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
    monthNamesShort: ['一','二','三','四','五','六','七','八','九','十','十一','十二'],
    dayNames: ['周日','周一','周二','周三','周四','周五','周六'],
    dayNamesShort: ['日','一','二','三','四','五','六'],
    timeFormat: 'H:mm',
    selectable: true,
    selectHelper: true,
    select: function(start, end, allDay) {
        var title = prompt('请输入事件标题:');
        if (title) {
            jQuery.post('".base_url('api/events/ajax_create')."', {title: title, start: Math.round(start.getTime()/1000), end: Math.round(end.getTime()/1000), allDay: allDay, color: fc_color, hash: hash}, function(data){
                if(data.id){
                    if(data.allDay == 'false') data.allDay = false;
                    if(avatar) data.avatar = avatar;
                    data.editable = true;
                    calendar.fullCalendar('renderEvent', data);
                }
            }, 'json');
        }
        calendar.fullCalendar('unselect');
    },
    eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
        if (!confirm('行程被改变了，确定吗？')) {
            revertFunc();
        }else{
            jQuery.post('".base_url('api/events/ajax_update')."', {action: 'drop', id: event.id, dayDelta: dayDelta, minuteDelta: minuteDelta, allDay: allDay, hash: hash}, function(data){
                if(data == 'false') revertFunc();
            });
        }
    },
    eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
        if (!confirm('这样可以了吗？')) {
            revertFunc();
        }else{
            jQuery.post('".base_url('api/events/ajax_update')."', {action: 'resize', id: event.id, dayDelta: dayDelta, minuteDelta: minuteDelta, hash: hash}, function(data){
                if(data == 'false') revertFunc();
            });
        }
    },
    eventClick: function(calEvent, jsEvent) {
        if(calEvent.editable)
        {
            var title = prompt('修改事件:在文本框内填写新事件标题\\n删除事件:清空文本框并确定则删除', calEvent.title);
            if(title != null && title != calEvent.title){
                if(title){
                    jQuery.post('".base_url('api/events/ajax_update')."', {action: 'modify', id: calEvent.id, title: title, color: fc_color, hash: hash}, function(data){
                        if(data == 'true'){
                            calEvent.title = title;
                            calEvent.color = fc_color;
                            calendar.fullCalendar('updateEvent', calEvent);
                        }
                    });
                }else{
                    if (confirm('删除行程不可恢复，确定吗？')) {
                        jQuery.post('".base_url('api/events/ajax_update')."', {action: 'remove', id: calEvent.id, hash: hash}, function(data){
                            if(data == 'true'){
                                calendar.fullCalendar('removeEvents', calEvent.id);
                            }
                        });
                    }
                }
            }
        }
    },
    eventRender: function(calEvent, element) {
        if(calEvent.avatar){
            element.find('.fc-event-inner').prepend('<img src=\"' + AVATAR_URL + calEvent.avatar + '_small.png\" width=\"20\" height=\"20\">');
        }
    }
});\n";

        $this->load->view('common/layout', $this->_data);
    }
    
}

/* End of file Calendar.php */
/* Location: ./application/controllers/member/Calendar.php */