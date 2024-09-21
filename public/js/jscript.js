// JavaScript Document
function validate_employee()
{
	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}

function validate_project()
{
	if ($("#id").val() == 0)
		$("#act").val('add');
	else
	{
		$("#act").val('update');
	}
//	$("#frmemployee").submit();		
}

function update_project()
{
//	alert('sdf');
//	$("#act").val('update');
//	$('.main_title label').text('Update Project');
//	$('#btnAddProject').val('Update Project');
}

function delete_project(id)
{
	
	var r=confirm("Are you sure to delete this project?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#form1").submit();					
			  }
		  else
		  return false;
//	$("#frmemployee").submit();		
}
function delete_pcdetails(id)
{
	
    var r=confirm("Are you sure to delete this pc details?");
            if (r==true)
              {
                    $("#act").val('delete');	
                    $("#id").val(id);		
                    $("#frmcity").submit();					
                      }
              else
              return false;
//	$("#frmemployee").submit();		
}

function validate_user()
{
	//alert("Hi");
	if(document.getElementById("id").value == 0)
	{
		document.getElementById("act").value = 'add';
	}
	else
	{
		document.getElementById("act").value = 'update';
	}
	
	/*if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');*/	
	
}

function delete_user(id)
{
	
	var r=confirm("Are you sure to delete this user?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formuser").submit();					
			  }
		  else
		  return false;
}

function update_user()
{

}

function delete_employee(id)
{
	
	var r=confirm("Are you sure to delete this employee?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formemployee").submit();					
			  }
		  else
		  return false;
}

function update_employee()
{

}
function delete_client(id)
{
	
	var r=confirm("Are you sure to delete this Client?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formclient").submit();					
			  }
		  else
		  return false;
}

function delete_configuration(id)
{
	
	var r=confirm("Are you sure to delete this Configuration?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formconfiguration").submit();					
			  }
		  else
		  return false;
}

function delete_emp_message(id)
{
	var r=confirm("Are you sure to delete this Employee message?");
		if (r==true)
	  	{
			$("#act").val('delete');	
			$("#id").val(id);		
			$("#frmEmployeeMsg").submit();					
		}
		else
		{
			return false;
		}
}
function delete_lock_task(id)
{
	var r=confirm("Are you sure to delete this task?");
		if (r==true)
	  	{
			$("#act").val('delete');	
			$("#id").val(id);		
			$("#frmEmployeeMsg").submit();					
		}
		else
		{
			return false;
		}
}
function delete_employee_overtime(id)
{
	var r=confirm("Are you sure to delete this employee over time?");
		if (r==true)
	  	{
			$("#act").val('delete');	
			$("#id").val(id);		
			$("#frmEmployeeOvertime").submit();					
		}
		else
		{
			return false;
		}
}
function update_client()
{

}

function validate_client()
{
	if ($("#id").val() == 0)
	{
		$("#act").val('add');
	}
	else
	{
		$("#act").val('update');
	}
//	$("#frmemployee").submit();		
}
function show_Reference(str)
	{
		var xmlhttp;
		//alert(str);
		if (str=="")
		  {
			document.getElementById("user_reference").innerHTML="";
		  	return;
		  }
		else if(str=='S')
		{
			document.getElementById("user_reference").innerHTML="<option value='0'>none</option>";
		  	return;
		}
		if(window.XMLHttpRequest)
		  {
		 	 xmlhttp=new XMLHttpRequest();
			
		  }
		else
		  {
		 	 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			xmlhttp.onreadystatechange=function()
		  { 
		 if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{		
			
				document.getElementById("user_reference").innerHTML=xmlhttp.responseText;
				
			}
		 }
	
xmlhttp.open("GET","user_ajax.php?q="+str,true);
xmlhttp.send();
}
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	{
		return false;
	}
	else
	{		
		return true;
	}
	
}
function validate_state()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
	
	}
function validate_message_sub_category()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
	
}
function validate_country()
{
	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}

function delete_country(id)
{
	
	var r=confirm("Are you sure to delete this Country?");
		if (r==true)
		  {
			
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formcountry").submit();					
		  }
		  else  
		  return false;
}
update_state()


function delete_raw_material(id)
{
	
	var r=confirm("Are you sure to delete this Raw Material?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmRawMaterial").submit();
			  }
		  else
		  return false;
}

function delete_recipe(id)
{

	var r=confirm("Are you sure to delete this Recipe?");
		if (r==true)
		  {
	  		$("#act").val('delete');
	  		$("#id").val(id);
			$("#frmRecipe").submit();
			  }
		  else
		  return false;
}

function delete_user(id)
{

	var r=confirm("Are you sure to delete this User?");
		if (r==true)
		  {
	  		$("#act").val('delete');
	  		$("#id").val(id);
			$("#frmManageUser").submit();
			  }
		  else
		  return false;
}

function delete_state(id)
{
	
	var r=confirm("Are you sure to delete this state?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmstate").submit();					
			  }
		  else
		  return false;
}
function validate_overtime()
{
    if ($("#id").val() == 0)
            $("#act").val('add');	
    else
            $("#act").val('update');	
	
}
function delete_message_sub_category(id)
{
	
	var r=confirm("Are you sure to delete this Message Sub Category?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmMessageSubCategory").submit();					
			  }
		  else
		  return false;
}
function delete_empteam(id)
{
	var r=confirm("Are you sure to delete this employee team?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmempteam").submit();					
			  }
		  else
		  return false;
}
function delete_city(id)
{
	
	var r=confirm("Are you sure to delete this city?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmcity").submit();					
			  }
		  else
		  return false;
}
function delete_category(id)
{
	
	var r=confirm("Are you sure to delete this Message Category?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formMessageCategory").submit();					
			  }
		  else  
		  return false;
}
function validate_category()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}
function delete_timer(id)
{
	
	var r=confirm("Are you sure to delete this timer?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmcity").submit();					
			  }
		  else
		  return false;
}
function update_state()
{

}
function validate_state()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
	
	}
	function validate_city()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
	
	}
function update_city()
{
	}
	
function validate_district()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}
function delete_district(id)
{
	
	var r=confirm("Are you sure to delete this District?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmdistrict").submit();					
			  }
		  else
		  return false;
}

function validate_employeeleave()
{
		
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	

	}
	function validate_leave()
{
	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}
function validate_employeeleaveconfirm()
{
	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}
function validate_AdminMenu()
{
	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}
function delete_admin_menu(id)
{
	
	var r=confirm("Are you sure to delete this Admin Menu?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formAdminMenu").submit();					
			  }
		  else
		  return false;
}
function delete_admin(id)
{
	
	var r=confirm("Are you sure to delete this admin?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formadmin").submit();					
			  }
		  else
		  return false;
}
function delete_admin_menu_rights(id)
{
	
	var r=confirm("Are you sure to delete this admin rights?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formAdminRights").submit();					
			  }
		  else
		  return false;
}
function delete_admin_notification_rights(id)
{
	
	var r=confirm("Are you sure to delete this admin notification rights?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formAdminNotificationRights").submit();					
			  }
		  else
		  return false;
}
function validate_admin()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
	
	}
function validate_admin_menu_rights()
{	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}

function validate_admin_notification_rights()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}

function delete_message(id)
{  
	var r=confirm("Are you sure to delete this Message?");
	
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmmessage").submit();		
		 }
		 else
		 {
		  	return false;
		 }
}

function delete_news(id)
{  
	var r=confirm("Are you sure to delete this News?");
	
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#frmnews").submit();		
		 }
		 else
		 {
		  	return false;
		 }
}

function validate_message()
{
	if ($("#id").val() == 0)
	{
		$("#act").val('add');
	}
	else
	{
		$("#act").val('update');
	}
}

function delete_empIncrement(id)
{  
	var r=confirm("Are you sure to delete this Employee Increment?");
	
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formemployee_increment").submit();		
		 }
		 else
		 {
		  	return false;
		 }
}
function validate_employee_increment()
{
	if ($("#id").val() == 0)
	{
		$("#act").val('add');
	}
	else
	{
		$("#act").val('update');
	}
}
function validate_evalution_status()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}

function delete_evalution(id)
{  
	var r=confirm("Are you sure to delete this Message?");
	
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formevalution").submit();		
		 }
		 else
		 {
		  	return false;
		 }
}
function validate_holidays()
{
	
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}

function delete_holiday(id)
{  
	var r=confirm("Are you sure to delete this holidays?");
	
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formholiday").submit();		
		 }
		 else
		 {
		  	return false;
		 }
}
function validate_employeeleave()
{
	if ($("#id").val() == 0)
		$("#act").val('add');	
	else
		$("#act").val('update');	
}
function delete_empLeave(id)
{  
	var r=confirm("Are you sure to delete this Employee Leave?");
	
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formLeave").submit();		
		 }
		 else
		 {
		  	return false;
		 }
}
function delete_assignment(id)
{
	
	var r=confirm("Are you sure to delete this assignment?");
		if (r==true)
		  {
	  		$("#act").val('delete');	
	  		$("#id").val(id);		
			$("#formemployee").submit();					
			  }
		  else
		  return false;
}
function delete_peripheral(id)
{
	var r=confirm("Are you sure to delete this peripheral?");
	if (r==true)
	{
		$("#act").val('delete');	
		$("#id").val(id);		
		$("#form1").submit();					
	}
	else
	{
	  return false;
	}
}

function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	}
	return true;
}


