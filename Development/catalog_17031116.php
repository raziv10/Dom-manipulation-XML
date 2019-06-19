<?php
$server="localhost";
$username="root";
$password="";
$database="company_yorbax";
/* Database connectivity */
$connect= new mysqli($server,$username,$password,$database);

if ($connect ->connect_error)
{
    echo "Database not found";
}
else
{
    echo "Successful connected to the database!!";
}

$xml= new DomDocument("1.0");
$xml->formatOutput=true;

/*------------Queries-----------------*/
$company_query="Select * from company_detail";
$company_query_result=$connect->query($company_query);

$ceo_query="Select * from ceo";
$ceo_query_result=$connect->query($ceo_query);

$reasearch_department_query="Select * from department where ID='1'";
$research_department_query_result=$connect->query($reasearch_department_query);

$marketing_department_query="Select * from department where ID='2'";
$marketing_department_query_result=$connect->query($marketing_department_query);

$humanResource_department_query="Select * from department where ID='3'";
$humanResource_department_query_result=$connect->query($humanResource_department_query);

$mobile_department_query="Select * from department where ID='4'";
$mobile_department_query_result=$connect->query($mobile_department_query);

$web_department_query="Select * from department where ID='5'";
$web_department_query_result=$connect->query($web_department_query);

$mobileDpt_project_query="Select * from project where ID='1'";
$mobileDpt_project_query_result=$connect->query($mobileDpt_project_query);

$webDpt_project_query="Select * from project where ID='2'";
$webDpt_project_query_result=$connect->query($webDpt_project_query);



$project_manager_query="Select * from project_manager";
$project_manager_query_result=$connect->query($project_manager_query);
$project_manager_query_result1=$connect->query($project_manager_query);


$team_leader_query="Select * from leader";
$team_leader_query_result=$connect->query($team_leader_query);
$team_leader_query_result1=$connect->query($team_leader_query);

$reasearchDpt_employee_query="Select * from employee where ID in (2,3)";
$reasearchDpt_employee_query_result=$connect->query($reasearchDpt_employee_query);

$marketingDpt_employee_query="Select * from employee where ID in (7)";
$marketingDpt_employee_query_result=$connect->query($marketingDpt_employee_query);

$humanResource_employee_query="Select * from employee where ID in (4,5)";
$humanResource_employee_query_result=$connect->query($humanResource_employee_query);

$mobileDpt_employee_query="Select * from employee where ID in (1,8)";
$mobileDpt_employee_query_result=$connect->query($mobileDpt_employee_query);

$webDpt_employee_query="Select * from employee where ID in (6,9,10)";
$webDpt_employee_query_result=$connect->query($webDpt_employee_query);

/*Root tag*/
$company=$xml->createElement("company");
$xml->appendChild($company);

$company_logo=$xml->createElement("logo");
$company_detail=$xml->createElement("company_detail");
$company->appendChild($company_detail);
$company->appendChild($company_logo);

/*Query to fetch the data from the Company table to display the details of the company*/
while($row=mysqli_fetch_assoc($company_query_result))
{

    $company_name=$xml->createElement("name",$row["name"]);
    $company_address=$xml->createElement("address",$row["address"]);
    $company_phone=$xml->createElement("contact",$row["contact"]);
    $company_website=$xml->createElement("website",$row["website"]);
    $company_estDate=$xml->createElement("establish_date",$row["establishDate"]);

    $company->appendChild($company_detail);
    $company_detail->appendChild($company_name);
    $company_detail->appendChild($company_address);
    $company_detail->appendChild($company_phone);
    $company_detail->appendChild($company_website);
    $company_detail->appendChild($company_estDate);

    $ceo=$xml->createElement("ceo");
    $company->appendChild($ceo);

    $ceo_detail=$xml->createElement("ceo_details");
    $ceo_photo=$xml->createElement("ceo_photo");

    $ceo->appendChild($ceo_photo);
    $ceo->appendChild($ceo_detail);
        
}
/*Query to fetch the data from the Ceo table to display the details of the ceo*/
while($row=mysqli_fetch_assoc($ceo_query_result))
{
    $name=$xml->createElement("name");
    $ceo_fname=$xml->createElement("first_name",$row["fname"]);
    $ceo_lname=$xml->createElement("last_name",$row["lname"]);
    $ceo_age=$xml->createElement("age",$row["age"]);
    $ceo_sex=$xml->createElement("gender",$row["sex"]);
    $ceo_email=$xml->createElement("email",$row["email"]);
    $ceo_salary=$xml->createElement("salary",$row["salary"]);

    $name->appendChild($ceo_fname);
    $name->appendChild($ceo_lname);
    $ceo_detail->appendChild($name);
    $ceo_detail->appendChild($ceo_age);
    $ceo_detail->appendChild($ceo_sex);
    $ceo_detail->appendChild($ceo_email);
    $ceo_detail->appendChild($ceo_salary);

}

/*Query to fetch the data from the department table to display the details of the mobile department*/
/* Department which is handled by the project manager and the team leader*/
while($row=mysqli_fetch_assoc($mobile_department_query_result))
{
    $department=$xml->createElement("department");
    $department_details=$xml->createElement("department_details");
    $department->setAttribute("dptID",$row["ID"]);
    $department_id=$xml->createElement("Department_ID");
    
    $department_name=$xml->createElement("department_name",$row["name"]);
    $department_floor=$xml->createElement("department_floor",$row["floor"]);
    $department_details->appendChild($department_name);
    $department_details->appendChild($department_floor);
    $department->appendChild($department_details);
    $ceo->appendChild($department);

    /*Query to fetch the data from the project manager table to display the details of the project manager*/
    while($row=mysqli_fetch_assoc($project_manager_query_result))
    {
        $project_mgr=$xml->createElement("project_manager");
        $project_mgr_photo=$xml->createElement("manager_photo");
        $project_mgr_details=$xml->createElement("manager_details");
        $project_mgr_details->setAttribute("dpt","Mobile");
        $name=$xml->createElement("name");
        $project_mgr_fname=$xml->createElement("first_name",$row["fname"]);
        $project_mgr_lname=$xml->createElement("last_name",$row["lname"]);
        $project_mgr_age=$xml->createElement("age",$row["age"]);
        $project_mgr_sex=$xml->createElement("gender",$row["sex"]);
        $project_mgr_email=$xml->createElement("email",$row["email"]);
        $project_mgr_salary=$xml->createElement("salary",$row["salary"]);
        
        $name->appendChild($project_mgr_fname);
        $name->appendChild($project_mgr_lname);
        $project_mgr_details->appendChild($name);
        $project_mgr_details->appendChild($project_mgr_age); 
        $project_mgr_details->appendChild($project_mgr_sex); 
        $project_mgr_details->appendChild($project_mgr_email); 
        $project_mgr_details->appendChild($project_mgr_salary); 
        $project_mgr->appendChild($project_mgr_details);
        $project_mgr->appendChild( $project_mgr_photo);
        $department->appendChild($project_mgr);
        /*Query to fetch the data from the project table to display the details of the projects*/
        while($row=mysqli_fetch_assoc($mobileDpt_project_query_result))
        {
            $project=$xml->createElement("project");
            $project->setAttribute("projID",$row["ID"]);
            $project_details=$xml->createElement("project_details");
            $project_photo=$xml->createElement("project_photo");
            $project_name=$xml->createElement("project_name",$row["name"]);
            $project_startDate=$xml->createElement("startDate",$row["startDate"]);
            $project_endDate=$xml->createElement("endDate",$row["endDate"]);
            $project_status=$xml->createElement("status",$row["status"]);

            $project_details->appendChild($project_photo);
            $project_details->appendChild($project_name);
            $project_details->appendChild($project_startDate);
            $project_details->appendChild($project_endDate);
            $project_details->appendChild($project_status);
            
            $project->appendChild($project_details);
            $project_mgr->appendChild($project);

            /*Query to fetch the data from the leader table to display the details of the team leader*/
            while($row=mysqli_fetch_assoc($team_leader_query_result))
            {
                $team_leader=$xml->createElement("team_leader");
                $team_leader_photo=$xml->createElement("leader_photo");
                $team_leader_details=$xml->createElement("leader_details");
                $team_leader_details->setAttribute("dpt","Mob");
                $name=$xml->createElement("name");
                $team_leader_fname=$xml->createElement("first_name",$row["fname"]);
                $team_leader_lname=$xml->createElement("last_name",$row["lname"]);
                $team_leader_age=$xml->createElement("age",$row["age"]);
                $team_leader_sex=$xml->createElement("gender",$row["sex"]);
                $team_leader_email=$xml->createElement("email",$row["email"]);
                $team_leader_salary=$xml->createElement("salary",$row["salary"]);
                $team_member=$xml->createElement("member",$row["team_member"]);

                $name->appendChild($team_leader_fname);
                $name->appendChild($team_leader_lname);
                $team_leader_details->appendChild($name);
                $team_leader_details->appendChild($team_leader_age);
                $team_leader_details->appendChild($team_leader_sex);
                $team_leader_details->appendChild($team_leader_email);
                $team_leader_details->appendChild($team_leader_salary);
                $team_leader_details->appendChild($team_member);

                $team_leader->appendChild($team_leader_photo);
                $team_leader->appendChild($team_leader_details);
                $project->appendChild($team_leader);

                /*Query to fetch the data from the employee table to display the details of the employees*/
                /*Query to fetch the employees working for the mobile department only*/
                while($row=mysqli_fetch_assoc($mobileDpt_employee_query_result))
                {
                   
                    $employee=$xml->createElement("Employee");
                    $employee->setAttribute("empID",$row["ID"]);
                    $employee_details=$xml->createElement("employee_details");

                    $emp_name=$xml->createElement("name");
                    $employee_fname=$xml->createElement("First_name",$row["fname"]);
                    $employee_lname=$xml->createElement("Last_name",$row["lname"]);
                    $employee_age=$xml->createElement("age",$row["age"]);
                    $employee_sex=$xml->createElement("gender",$row["sex"]);
                    $employee_email=$xml->createElement("email",$row["email"]);
                    $employee_salary=$xml->createElement("salary",$row["salary"]);

                    $emp_name->appendChild($employee_fname);
                    $emp_name->appendChild($employee_lname);
                    $employee_details->appendChild($emp_name);
                    $employee_details->appendChild($employee_age);
                    $employee_details->appendChild($employee_sex);
                    $employee_details->appendChild($employee_email);
                    $employee_details->appendChild($employee_salary);

                    $employee->appendChild($employee_details);
                    $team_leader->appendChild($employee);
                }
            } 
        }

    }
}

/*Query to fetch the data from the department table to display the details of the web department*/
/* Department which is handled by the project manager and the team leader*/
while($row=mysqli_fetch_assoc($web_department_query_result))
{
    $department=$xml->createElement("department");
    $department_details=$xml->createElement("department_details");
    $department->setAttribute("dptID",$row["ID"]);
    $department_id=$xml->createElement("Department_ID");
    
    $department_name=$xml->createElement("department_name",$row["name"]);
    $department_floor=$xml->createElement("department_floor",$row["floor"]);
    $department_details->appendChild($department_name);
    $department_details->appendChild($department_floor);
    $department->appendChild($department_details);
    $ceo->appendChild($department);

    while($row=mysqli_fetch_assoc($project_manager_query_result1))
    {
        $project_mgr=$xml->createElement("project_manager");
        $project_mgr_details=$xml->createElement("manager_details");
        $project_mgr_details->setAttribute("dpt","Web");
        $name=$xml->createElement("name");
        $project_mgr_fname=$xml->createElement("first_name",$row["fname"]);
        $project_mgr_lname=$xml->createElement("last_name",$row["lname"]);
        $project_mgr_age=$xml->createElement("age",$row["age"]);
        $project_mgr_sex=$xml->createElement("gender",$row["sex"]);
        $project_mgr_email=$xml->createElement("email",$row["email"]);
        $project_mgr_salary=$xml->createElement("salary",$row["salary"]);
        
        $name->appendChild($project_mgr_fname);
        $name->appendChild($project_mgr_lname);
        $project_mgr_details->appendChild($name);
        $project_mgr_details->appendChild($project_mgr_age); 
        $project_mgr_details->appendChild($project_mgr_sex); 
        $project_mgr_details->appendChild($project_mgr_email); 
        $project_mgr_details->appendChild($project_mgr_salary); 
        $project_mgr->appendChild($project_mgr_details);
        $department->appendChild($project_mgr);
        while($row=mysqli_fetch_assoc($webDpt_project_query_result))
        {
            $project=$xml->createElement("project");
            $project_details=$xml->createElement("project_details");
            $project_photo=$xml->createElement("project_photo");
            $project->setAttribute("projID",$row["ID"]);
            $project_name=$xml->createElement("project_name",$row["name"]);
            $project_startDate=$xml->createElement("startDate",$row["startDate"]);
            $project_endDate=$xml->createElement("endDate",$row["endDate"]);
            $project_status=$xml->createElement("status",$row["status"]);

            $project_details->appendChild($project_photo);
            $project_details->appendChild($project_name);
            $project_details->appendChild($project_startDate);
            $project_details->appendChild($project_endDate);
            $project_details->appendChild($project_status);
            
            $project->appendChild($project_details);
            $project_mgr->appendChild($project);



            while($row=mysqli_fetch_assoc($team_leader_query_result1))
            {
                $team_leader=$xml->createElement("team_leader");
                $team_leader_details=$xml->createElement("leader_details");
                $team_leader_details->setAttribute("dpt","Web");
                $name=$xml->createElement("name");
                $team_leader_fname=$xml->createElement("first_name",$row["fname"]);
                $team_leader_lname=$xml->createElement("last_name",$row["lname"]);
                $team_leader_age=$xml->createElement("age",$row["age"]);
                $team_leader_sex=$xml->createElement("gender",$row["sex"]);
                $team_leader_email=$xml->createElement("email",$row["email"]);
                $team_leader_salary=$xml->createElement("salary",$row["salary"]);
                $team_member=$xml->createElement("member",$row["team_member"]);

                $name->appendChild($team_leader_fname);
                $name->appendChild($team_leader_lname);
                $team_leader_details->appendChild($name);
                $team_leader_details->appendChild($team_leader_age);
                $team_leader_details->appendChild($team_leader_sex);
                $team_leader_details->appendChild($team_leader_email);
                $team_leader_details->appendChild($team_leader_salary);
                $team_leader_details->appendChild($team_member);
                
                $team_leader->appendChild($team_leader_details);
                $project->appendChild($team_leader);

                /*Query to fetch the employees working for the web department only*/
                while($row=mysqli_fetch_assoc($webDpt_employee_query_result))
                {
                    $employee=$xml->createElement("Employee");
                    $employee->setAttribute("empID",$row["ID"]);
                    $employee_details=$xml->createElement("employee_details");

                    $emp_name=$xml->createElement("name");
                    $employee_fname=$xml->createElement("First_name",$row["fname"]);
                    $employee_lname=$xml->createElement("Last_name",$row["lname"]);
                    $employee_age=$xml->createElement("age",$row["age"]);
                    $employee_sex=$xml->createElement("gender",$row["sex"]);
                    $employee_email=$xml->createElement("email",$row["email"]);
                    $employee_salary=$xml->createElement("salary",$row["salary"]);

                    $emp_name->appendChild($employee_fname);
                    $emp_name->appendChild($employee_lname);
                    $employee_details->appendChild($emp_name);
                    $employee_details->appendChild($employee_age);
                    $employee_details->appendChild($employee_sex);
                    $employee_details->appendChild($employee_email);
                    $employee_details->appendChild($employee_salary);

                    $employee->appendChild($employee_details);
                    $team_leader->appendChild($employee);
                }
            } 
        }

    }
}

/*Query to fetch the data from the department table to display the details of the research department*/
/* Department which have no project manager and the team leader*/
while($row=mysqli_fetch_assoc($research_department_query_result))
{
    $department=$xml->createElement("department");
    $department_details=$xml->createElement("department_details");
    $department->setAttribute("dptID",$row["ID"]);
    $department_id=$xml->createElement("Department_ID");
    
    $department_name=$xml->createElement("department_name",$row["name"]);
    $department_floor=$xml->createElement("department_floor",$row["floor"]);
    $department_details->appendChild($department_name);
    $department_details->appendChild($department_floor);
    $department->appendChild($department_details);
    $ceo->appendChild($department);
    /*Query to fetch the employees working for the research department only*/
        while($row=mysqli_fetch_assoc($reasearchDpt_employee_query_result))
            {
                $employee=$xml->createElement("Employee");
                $employee->setAttribute("empID",$row["ID"]);
                $employee_details=$xml->createElement("employee_details");

                $emp_name=$xml->createElement("name");
                $employee_fname=$xml->createElement("First_name",$row["fname"]);
                $employee_lname=$xml->createElement("Last_name",$row["lname"]);
                $employee_age=$xml->createElement("age",$row["age"]);
                $employee_sex=$xml->createElement("gender",$row["sex"]);
                $employee_email=$xml->createElement("email",$row["email"]);
                $employee_salary=$xml->createElement("salary",$row["salary"]);

                $emp_name->appendChild($employee_fname);
                $emp_name->appendChild($employee_lname);
                $employee_details->appendChild($emp_name);
                $employee_details->appendChild($employee_age);
                $employee_details->appendChild($employee_sex);
                $employee_details->appendChild($employee_email);
                $employee_details->appendChild($employee_salary);

                $employee->appendChild($employee_details);
                $department->appendChild($employee);
            }
            
            
}
/*Query to fetch the data from the department table to display the details of the marketing department*/
/* Department which have no project manager and the team leader*/
while($row=mysqli_fetch_assoc($marketing_department_query_result))

{
    $department=$xml->createElement("department");
    $department_details=$xml->createElement("department_details");
    $department->setAttribute("dptID",$row["ID"]);
    $department_id=$xml->createElement("Department_ID");
    
    $department_name=$xml->createElement("department_name",$row["name"]);
    $department_floor=$xml->createElement("department_floor",$row["floor"]);
    $department_details->appendChild($department_name);
    $department_details->appendChild($department_floor);
    $department->appendChild($department_details);
    $ceo->appendChild($department);
    /*Query to fetch the employees working for the marketing department only*/
        while($row=mysqli_fetch_assoc($marketingDpt_employee_query_result))
            {
                $employee=$xml->createElement("Employee");
                $employee->setAttribute("empID",$row["ID"]);
                $employee_details=$xml->createElement("employee_details");

                $emp_name=$xml->createElement("name");
                $employee_fname=$xml->createElement("First_name",$row["fname"]);
                $employee_lname=$xml->createElement("Last_name",$row["lname"]);
                $employee_age=$xml->createElement("age",$row["age"]);
                $employee_sex=$xml->createElement("gender",$row["sex"]);
                $employee_email=$xml->createElement("email",$row["email"]);
                $employee_salary=$xml->createElement("salary",$row["salary"]);

                $emp_name->appendChild($employee_fname);
                $emp_name->appendChild($employee_lname);
                $employee_details->appendChild($emp_name);
                $employee_details->appendChild($employee_age);
                $employee_details->appendChild($employee_sex);
                $employee_details->appendChild($employee_email);
                $employee_details->appendChild($employee_salary);

                $employee->appendChild($employee_details);
                $department->appendChild($employee);
            }
     
}
/*Query to fetch the data from the department table to display the details of the human resource department*/
/* Department which have no project manager and the team leader*/
while($row=mysqli_fetch_assoc($humanResource_department_query_result))
{
    $department=$xml->createElement("department");
    $department_details=$xml->createElement("department_details");
    $department->setAttribute("dptID",$row["ID"]);
    $department_id=$xml->createElement("Department_ID");
    
    $department_name=$xml->createElement("department_name",$row["name"]);
    $department_floor=$xml->createElement("department_floor",$row["floor"]);
    $department_details->appendChild($department_name);
    $department_details->appendChild($department_floor);
    $department->appendChild($department_details);
    $ceo->appendChild($department);
    /*Query to fetch the employees working for the human resource department only*/
        while($row=mysqli_fetch_assoc($humanResource_employee_query_result))
            {
                $employee=$xml->createElement("Employee");
                $employee->setAttribute("empID",$row["ID"]);
                $employee_details=$xml->createElement("employee_details");

                $emp_name=$xml->createElement("name");
                $employee_fname=$xml->createElement("First_name",$row["fname"]);
                $employee_lname=$xml->createElement("Last_name",$row["lname"]);
                $employee_age=$xml->createElement("age",$row["age"]);
                $employee_sex=$xml->createElement("gender",$row["sex"]);
                $employee_email=$xml->createElement("email",$row["email"]);
                $employee_salary=$xml->createElement("salary",$row["salary"]);

                $emp_name->appendChild($employee_fname);
                $emp_name->appendChild($employee_lname);
                $employee_details->appendChild($emp_name);
                $employee_details->appendChild($employee_age);
                $employee_details->appendChild($employee_sex);
                $employee_details->appendChild($employee_email);
                $employee_details->appendChild($employee_salary);

                $employee->appendChild($employee_details);
                $department->appendChild($employee);
            }
            
            
}

 echo "<xmp>".$xml->saveXML()."</xmp>"
// $xml -> save('catalog_17031116.xml');

?>