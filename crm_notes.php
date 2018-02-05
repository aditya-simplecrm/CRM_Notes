
//ajax
$.ajax({
  method: "POST",
  url: "index.php?entryPoint=ajaxCall",
  data: {datetime:datetime, type:"getAccommodations",accommodation_type:$('accommodation_type_c').val(),location:$('#location_c').val(),type_of_room:$('#type_of_room_c').val(), guest_type: $('#guest_type').val()}
}).success(function(rsp){
	rsp = JSON.parse(rsp);
	
	if(rsp.Success == true){
		$.each( rsp.data, function( key, value ) {
		  	console.log($('#'+key).text(value));
		});
		
		if(!rsp.data.book){
			$('#check_in_c_date').val('');
			$('#dialog').dialog();
		}
		
		if(rsp.data.rooms_available){
			var rooms_booked = rsp.data.rooms_booked.split(',');
			var i;
			$('#room_no_c').find('option').remove();
			for(i=1;i<=parseInt(rsp.data.rooms_available);i++){
			   
			   if($.inArray( i, rooms_booked ) == -1){
				  console.log($('#room_no_c').append($("<option></option>").attr("value",i).text(i)));
			   }
			}

		}
	}
});

//validation
addToValidate('EditView','location_c','location_c',true,'');
removeFromValidate('EditView','check_out_c_date');
$('#project_leads_1_name_label').append('<span class="required">*</span>');

  1 => 
  array (
    'name' => 'project_scrm_work_order_1_name',
    'displayParams' => 
    array (
      'initial_filter' => '&programme_type_c_advanced="+this.form.{$fields.programme_type_c.name}.value+"',
    ),
  ),
),

*********************************************************************************************************
//email template
require_once('modules/EmailTemplates/EmailTemplate.php');


$template = new EmailTemplate();
$template->retrieve_by_string_fields(array('id' => '61c56f2a-158c-4ebe-fa88-594230bd447d','type'=>'email'));

$userBean = BeanFactory::getBean('Users','5eb35c29-8944-28f5-3f1c-59436623fb2e');
// print_r($userBean);exit();
// $programme = $invoice->get_linked_beans('project_aos_invoices_1');

// $programme = BeanFactory::getBean('Project',$contact->project_contacts_2project_ida);

//Parse Body HTMLcc
$template->body_html = $template->parse_template_bean($template->body_html,$userBean->module_dir,$userBean);
$this->generatePDF($_REQUEST['id']);

$this->sendEmail($template->subject,$template->body_html,$userBean->email1);

SugarApplication::redirect('index.php?module=AOS_Invoices&action=DetailView&record='.$_REQUEST['id']);


require_once('modules/Emails/Email.php');
require_once('include/SugarPHPMailer.php');
$emailObj = new Email(); 

$defaults = $emailObj->getSystemDefaultEmail(); 

$mail = new SugarPHPMailer(); 

$mail->setMailerForSystem(); 
$mail->From = $defaults['email']; 
$mail->FromName = $defaults['name']; 

$mail->Subject = $subject; 
$mail->Body = $body; 
$mail->prepForOutbound(); 
$mail->AddAddress($email);
$mail->isHTML(true); 
$mail->AddAttachment('custom/modules/AOS_Invoices/invoice.pdf', 'invoice.pdf', 'base64', 'application/pdf');
// print_r($mail);exit();
@$mail->Send();

***************************************************************************************************
//logic hook file

<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 

$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(77, 'updateFields', 'custom/modules/scrm_Timetable/updateFieldsLogicHook.php','updateFields', 'updateFields'); 
?>

//logic hook logic file
<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
* 
*/
class updateFields
{
	
	public function updateName($bean)
	{
		$bean->name = $bean->scrm_admin_arranges_project_1_name;
		$bean->save();
	}
}

?>


//validation dialog

echo '<div id = "dialog" title= "Warning!!!" style="display:none"><p>Sorry no rooms are available!</p></div>';

//view default template

<?php

require_once('include/MVC/View/views/view.detail.php');

class <module>ViewMyView extends ViewDetail
{
    function display()
    {
        echo 'This is my new view<br>';
    }
}

**************************************************************************************************************

//fetch current user role
global $current_user;

$role = ACLRole::getUserRoleNames($current_user->id);
if (count($role)>0 && isset($role[0])) {
    $role = $role[0];
}else{
	//role is admin
    $role = false;
}
**************************************************************************************************************

//remove mass update
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');

class OpportunitiesViewList extends ViewList
{
function listViewProcess()
{
$this->lv->showMassupdateFields = false;
parent::listViewProcess();
}
}
*****************************************************************************************************************

//hide from mass update
go to path /custom/Extension/modules/{module_name}/Ext/Vardefs
$dictionary[{module_name}]['fields']['do_not_call']['massupdate']=false;


******************************************************************************************************************

//check access

ACLController::checkAccess('Contacts', 'edit', true)

*******************************************************************************************************************

//date validations
function getDate(sugardate) { 
        m = '';
        d = '';
         y = '';
         var dateParts = sugardate.match(date_reg_format);
        for (key in date_reg_positions) {
           index = date_reg_positions[key];
           if (key == 'm') {
            m = dateParts[index];
            m = (m * 1) - 1;
           } else if (key == 'd') {
           d = dateParts[index];
                } else {
           y = dateParts[index];
            }
             }
           var dd = new Date(y, m, d);
                return dd;
}

function check_dates(date_start, date_end) { 
         var jstart = $('#' + date_start).val();
          var jend = $('#' + date_end).val();

          if (jstart != '' && jend != '') {
                      var start = getDate(jstart);
                        var end = getDate(jend);

                         if (start > end) {
                      alert('MESSAGE')
                         return false;
                  }
}
}

*******************************************************************************************************************

//number format comma, indian number format
setlocale(LC_MONETARY, 'en_IN');
$amount = money_format('%!i', $amount);

*******************************************************************************************************************

//entry point path
custom/Extension/application/Ext/EntryPointRegistry

*******************************************************************************************************************

//save/override config
require_once 'modules/Configurator/Configurator.php';
$configurator = new Configurator();
$configurator->loadConfig(); 
$configurator->config['abc_module_api_url'] = $_REQUEST['api_url'];
$configurator->saveConfig();

*******************************************************************************************************************

//Ajax loading

//show
SUGAR.ajaxUI.showLoadingPanel();

//hide
SUGAR.ajaxUI.hideLoadingPanel();

*******************************************************************************************************************

//sort list view

//Go to view.list.php and add this code accordingly

public function listViewPrepare() {
    if(empty($_REQUEST['orderBy'])) { //check if the user has asked for an order, if not proceed 
            $_REQUEST['orderBy'] = 'start_time_c'; //set the field to order by NOTE: MUST BE ALL CAPS! 
            $_REQUEST['sortOrder'] = 'asc'; //set the order, ascending or descending 
    } 
    parent::listViewPrepare(); //continue running the extended function's code        
}


*******************************************************************************************************************

//currency conversion 

<?php
function convertCurrency($amount, $from, $to){
  $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
  preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
  $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
  return number_format(round($converted, 3),2);
}
echo convertCurrency("10.00", "GBP", "USD");

*******************************************************************************************************************

//Laravel Password reset link

http://161.202.21.7/asci/portal/public/password/reset/0195cb88c27829c2b27a5e12bee165241deb1075c1674b0551ce6f0c7dae720d

*******************************************************************************************************************

//To make jquery work in subpanel also,

 	function scrm_ProposalsViewEdit(){
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 	}

********************************************************************************************************************

//hide subpanel from detail view


//go to /custom/modules/Accounts/Ext/Layoutdefs/ and add a new file here with below code
<?php
unset($layout_defs["Opportunities"]["subpanel_setup"]['contacts']);
unset($layout_defs["Opportunities"]["subpanel_setup"]['opportunity_aos_quotes']);
// unset($layout_defs["Opportunities"]["subpanel_setup"]['quotes']);

********************************************************************************************************************