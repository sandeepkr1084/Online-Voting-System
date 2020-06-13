function count_numeric(name)
{
	for(let i=0;i<name.length;i++)
	{
		if(name[i]=='0' || name[i]=='1' || name[i]=='2' || name[i]=='3' || name[i]=='4' || name[i]=='5' || name[i]=='6' || name[i]=='7' || name[i]=='8' || name[i]=='9')
		{
			return 1;
		}
	}
	return 0;
}
function validate()
{
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var orgname = document.getElementById("orgname").value;
	var purpose = document.getElementById("purpose").value;
	var pass = document.getElementById("pass").value;
	var candidate = document.getElementById("candidate").value;
	var voters = document.getElementById("voters").value;


	var s_name = document.getElementById("s_name");
	s_name.style.color="red";
	s_name.style.marginLeft="75px";
	s_name.style.fontSize="10px";
	s_email = document.getElementById("s_email");
	s_email.style.color="red";
	s_email.style.marginLeft="75px";
	s_email.style.fontSize="10px";
	var o_name=document.getElementById("o_name");
	o_name.style.color="red";
	o_name.style.marginLeft="75px";
	o_name.style.fontSize="10px";
	var v_purpose = document.getElementById("v_purpose");
	v_purpose.style.color="red";
	v_purpose.style.marginLeft="75px";
	v_purpose.style.fontSize="10px";
	var s_pass = document.getElementById("s_pass");
	s_pass.style.color="red";
	s_pass.style.marginLeft="75px";
	s_pass.style.fontSize="10px";
	var s_candidate = document.getElementById("s_candidate");
	s_candidate.style.color="red";
	s_candidate.style.marginLeft="75px";
	s_candidate.style.fontSize="10px";
	var s_voters = document.getElementById("s_voters");
	s_voters.style.color="red";
	s_voters.style.marginLeft="75px";
	s_voters.style.fontSize="10px";


	if(name=="")
	{
		s_name.innerHTML="*please fill the name field...";
		return false;
	}
	else if(count_numeric(name)>0)
	{
		s_name.innerHTML="*it should not contain any numeric value...";
		return false;
	}
	else
	{
		s_name.innerHTML="";
	}
	if(email == "")
	{
         s_email.innerHTML="*please enter your email...";
         return false;
	}
	else
	{
		s_email.innerHTML="";
	}
	if(orgname == "")
	{
		o_name.innerHTML="*please enter your organization name...";
		return false;
	}
	else
	{
		o_name.innerHTML="";
	}
	if(purpose == "")
	{
		v_purpose.innerHTML="*please enter your purpose of voting...";
		return false;
	}
	else if(count_numeric(purpose)>0)
	{
		v_purpose.innerHTML="*it should not contain any numeric values...";
		return false;
	}
	else
	{
		v_purpose.innerHTML="";
	}
	if(candidate == "")
	{
		s_candidate.innerHTML="*it should not be empty...";
		return false;
	}
	else if(Number(candidate)<2)
	{
		s_candidate.innerHTML="*candidates should not be less then 2...";
		return false;
	}
	else
	{
		s_candidate.innerHTML="";
	}
	if(voters == "")
	{
		s_voters.innerHTML="*it should not be empty...";
		return false;
	}
	else if(Number(voters)<2)
	{
		s_voters.innerHTML="*voters should not be less then 2...";
		return false;
	}
	else
	{
		s_voters.innerHTML="";
	}
	if(pass.length<7)
	{
		s_pass.innerHTML="*password should contain atleast 7 digit...";
		return false;
	}
	else
	{
		s_pass.innerHTML="";
	}
}