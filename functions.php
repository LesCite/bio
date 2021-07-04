<?php 
include 'database.php';


/* 
==================== EXPLANATION ============================

xss_clean - eto function to na nag hahandle ng validation para ma clean yung string at gawing normal string  yung reserved words ng SQL 
reference: https://docs.actian.com/psql/psqlv13/index.html#page/sqlref/sqlkword.htm

----------------------------------------------------------------------------------------------------- 

global - eto naman is para ma apply yung variable na humahandle ng database

----------------------------------------------------------------------------------------------------- 

if statement - eto ginagamit kapag meron tayong condition na gusto gawin.

----------------------------------------------------------------------------------------------------- 

$_FILES["file"]["size"] > 3000000 - option to ng file para i accept ang image na 3mb only

----------------------------------------------------------------------------------------------------- 

header() - ginagamit to para mag redirect sa specific page, depends sayo kong saang page e.g, index.php

----------------------------------------------------------------------------------------------------- 

foreach loop - eto ginagamit para gawin string yung array, ang first rule ng foreach ay dapat ang gagamitin ay from array or else hindi sya babasahin.

----------------------------------------------------------------------------------------------------- 

$_SESSION - eto ginagamit bilang isang variable,  ang $_SESSION ay gumagana lang kapag meron session_start bago sya i declare
please refer to database.php 

----------------------------------------------------------------------------------------------------- 

move_uploaded_file - ginagamit to para i move yung mismong file upon uploading

----------------------------------------------------------------------------------------------------- 

real_escape_string and htmlentities - eto ginagamit para ma convert to normal string yung mga reserved words. 

----------------------------------------------------------------------------------------------------- 

implode -  eto ginagamit kapag meron array na sinend from form tag,  sineseparate nya using comma yung mga array,  and yung array ay ginagawa nyang string.

----------------------------------------------------------------------------------------------------- 

SQL Queries ( INSERT , UPDATE, SELECT, DELETE ) -
INSERT - ginagamit to para mag isnert ng data 
UPDATE - ginagamit to para mag update ng data 
SELECT - ginagamit to para makuha ynug data sa specific table
DELETE - ginagamit to para idelete yung data

WHERE OPERATOR - ginagamit to para i execute ang query para makuha lang yung specific na data

----------------------------------------------------------------------------------------------------- 

$database->insert_id - kinukuha neto yung last inserted id from table na unang inexecute ex. personal_data_tbl

----------------------------------------------------------------------------------------------------- 

INNER JOIN - ginagamit to para i join ang more than 2 table pero ang rules nya ay dapat may same column sila na naka lagay sa bawat table,
sa case natin, ang gamit nating unique column ay personal_data_id

----------------------------------------------------------------------------------------------------- 



question: 
bakit sa xss_clean dalawa yung parameter?

Answer: 
First parameter, eto yung request na sinesend from form which is yung POST or GET, sa side na to, POST yung first string 
Second Parameter, Eto yung parameter na sinesend from form tag sa add.php and edit.php for ex, <input name="parameter here to be edit">

*/


function add_or_update_personal_data(){
    global $database;

    $image                      = $_FILES['file']['name'];
    $desired_position           = xss_clean('POST','desired_position');
    $name                       = xss_clean('POST','name');
    $address                    = xss_clean('POST','address');
    $province                   = xss_clean('POST','province');
    $telephone                  = xss_clean('POST','telephone');
    $email                      = xss_clean('POST','email');
    $date_of_birth              = xss_clean('POST','date_of_birth');
    $civil_status               = xss_clean('POST','civil_status');
    $height                     = xss_clean('POST','height');
    $religion                   = xss_clean('POST','religion');
    $spouse                     = xss_clean('POST','spouse');
    $children                   = !empty($_POST['children']) ? implode(',',$_POST['children']) : ',';
    $father_name                = xss_clean('POST','father_name');
    $mother_name                = xss_clean('POST','mother_name');
    $language                   = !empty($_POST['language']) ? implode(',',$_POST['language']) : ',';
    $person_emergency           = xss_clean('POST','person_emergency');
    $person_emergency_details   = xss_clean('POST','person_emergency_details');
    $gender                     = xss_clean('POST','gender');
    $cellphone                  = xss_clean('POST','cellphone');
    $place_of_birth             = xss_clean('POST','place_of_birth');
    $citizenship                = xss_clean('POST','citizenship');
    $weight                     = xss_clean('POST','weight');
    $spouse_occupation          = xss_clean('POST','spouse_occupation');
    $children_date_of_birth     = !empty($_POST['children_date_of_birth']) ? implode(',',$_POST['children_date_of_birth']) : ',';
    $father_occupation          = xss_clean('POST','father_occupation');
    $mother_occupation          = xss_clean('POST','mother_occupation');


    $elementary                 = xss_clean('POST','elementary');
    $elementary_year_graduate   = xss_clean('POST','elementary_year_graduate');
    $high_school                = xss_clean('POST','high_school');
    $high_school_year_graduate  = xss_clean('POST','high_school_year_graduate');
    $college                    = xss_clean('POST','college');
    $college_year_graduate      = xss_clean('POST','college_year_graduate');
    $degree_received            = xss_clean('POST','degree_received');
    $special_skills             = !empty($_POST['special_skills']) ? implode(',',$_POST['special_skills']) : ',';


    $company_name_1             = xss_clean('POST','company_name_1');
    $position_1                 = xss_clean('POST','position_1');
    $from_1                     = xss_clean('POST','from_1');
    $to_1                       = xss_clean('POST','to_1');
    $company_name_2             = xss_clean('POST','company_name_2');
    $position_2                 = xss_clean('POST','position_2');
    $from_2                     = xss_clean('POST','from_2');
    $to_2                       = xss_clean('POST','to_2');


    $c_name_1                   = xss_clean('POST','c_name_1');
    $c_company_1                = xss_clean('POST','c_company_1');
    $c_position_1               = xss_clean('POST','c_position_1');
    $c_contact_no_1             = xss_clean('POST','c_contact_no_1');
    $c_name_2                   = xss_clean('POST','c_name_2');
    $c_company_2                = xss_clean('POST','c_company_2');
    $c_position_2               = xss_clean('POST','c_position_2');
    $c_contact_no_2             = xss_clean('POST','c_contact_no_2');




    foreach($_POST as $key => $value) {
        $validate = $_POST[$key];
        if($validate == '') {
            $_SESSION[$key]  = $key. " field is required";
        }
    }

    if(isset($_POST['personal_data_id'])) {
        $cond = '';
        if(empty($_FILES['file']['name'])) {
            $cond .= '';
        } else {    
            $cond .= "image = '$image' ,";
        }
        $database->query("UPDATE personal_data_tbl SET $cond desired_position = '$desired_position',name = '$name' ,address = '$address' ,province = '$province' ,telephone = '$telephone' ,email = '$email' ,date_of_birth = '$date_of_birth' ,civil_status = '$civil_status' ,height = '$height' ,religion = '$religion' ,spouse = '$spouse' ,children = '$children' ,father_name = '$father_name' ,mother_name = '$mother_name' ,language = '$language' ,person_emergency = '$person_emergency' ,person_emergency_details = '$person_emergency_details' ,gender = '$gender' ,cellphone = '$cellphone' ,place_of_birth = '$place_of_birth' ,citizenship = '$citizenship' ,weight = '$weight' ,spouse_occupation = '$spouse_occupation' ,children_date_of_birth = '$children_date_of_birth' ,father_occupation = '$father_occupation' ,mother_occupation = '$mother_occupation'  WHERE personal_data_id = ".$_POST['personal_data_id']);
        
        $database->query("UPDATE educational_background_tbl SET elementary = '$elementary', elementary_year_graduate = '$elementary_year_graduate', high_school = '$high_school', high_school_year_graduate = '$high_school_year_graduate', college = '$college', college_year_graduate = '$college_year_graduate', degree_received = '$degree_received', special_skills = '$special_skills' WHERE personal_data_id = ".$_POST['personal_data_id']);

        $database->query("UPDATE employment_record_tbl SET company_name_1 = '$company_name_1', position_1 = '$position_1', from_1 = '$from_1', to_1 = '$to_1', company_name_2 = '$company_name_2', position_2 = '$position_2', from_2 = '$from_2', to_2 = '$to_2' WHERE personal_data_id = ".$_POST['personal_data_id']);

        $database->query("UPDATE character_reference_tbl SET c_name_1 = '$c_name_1', c_company_1 = '$c_company_1', c_position_1 = '$c_position_1', c_contact_no_1 = '$c_contact_no_1', c_name_2 = '$c_name_2', c_company_2 = '$c_company_2', c_position_2 = '$c_position_2', c_contact_no_2 = '$c_contact_no_2' WHERE personal_data_id =".$_POST['personal_data_id']);
        move_uploaded_file($_FILES['file']['tmp_name'],'assets/image/'.$_FILES['file']['name']);

        header('location:edit.php?id='.$_POST['personal_data_id']);
    } else {
        
       

        if ($_FILES["file"]["size"] > 3000000) {
            $_SESSION['file'] = "Sorry, your file is too large. image accept less than 3 MB";
        } else {
                $query = $database->query("INSERT INTO personal_data_tbl 
                (image,desired_position,name,address,province,telephone,email,date_of_birth,civil_status,height,religion,spouse,children,father_name,mother_name,language,person_emergency,person_emergency_details,gender,cellphone,place_of_birth,citizenship,weight,spouse_occupation,children_date_of_birth,father_occupation,mother_occupation) 
                VALUES 
                ('$image','$desired_position','$name','$address','$province','$telephone','$email','$date_of_birth','$civil_status','$height','$religion','$spouse','$children','$father_name','$mother_name','$language','$person_emergency','$person_emergency_details','$gender','$cellphone','$place_of_birth','$citizenship','$weight','$spouse_occupation','$children_date_of_birth','$father_occupation','$mother_occupation')");
                if($query) {
                    $id = $database->insert_id;
                    $database->query("INSERT INTO educational_background_tbl 
                    (personal_data_id,elementary,elementary_year_graduate,high_school,high_school_year_graduate,college,college_year_graduate,degree_received,special_skills) 
                    VALUES 
                    ('$id','$elementary','$elementary_year_graduate','$high_school','$high_school_year_graduate','$college','$college_year_graduate','$degree_received','$special_skills')");
        
                    $database->query("INSERT INTO employment_record_tbl 
                    (personal_data_id,company_name_1,position_1,from_1,to_1,company_name_2,position_2,from_2,to_2) 
                    VALUES 
                    ('$id','$company_name_1','$position_1','$from_1','$to_1','$company_name_2','$position_2','$from_2','$to_2')");
        
                    $database->query("INSERT INTO character_reference_tbl 
                    (personal_data_id,c_name_1,c_company_1,c_position_1,c_contact_no_1,c_name_2,c_company_2,c_position_2,c_contact_no_2) 
                    VALUES 
                    ('$id','$c_name_1','$c_company_1','$c_position_1','$c_contact_no_1','$c_name_2','$c_company_2','$c_position_2','$c_contact_no_2')");
        
                    move_uploaded_file($_FILES['file']['tmp_name'],'assets/image/'.$_FILES['file']['name']);
                }
            }
        
    }
}

function show_bio_data() {
    global $database;
    $query = $database->query("SELECT * FROM  personal_data_tbl as pdt INNER JOIN educational_background_tbl as ebt ON pdt.personal_data_id = ebt.personal_data_id INNER JOIN employment_record_tbl as ert ON ebt.personal_data_id = ert.personal_data_id INNER JOIN character_reference_tbl as crt ON pdt.personal_data_id = crt.personal_data_id");
    return $query;
}

function delete_bio_data($personal_data_id) {
    global $database;
    $database->query("DELETE FROM personal_data_tbl WHERE personal_data_id = $personal_data_id");
    $database->query("DELETE FROM educational_background_tbl WHERE personal_data_id = $personal_data_id");
    $database->query("DELETE FROM employment_record_tbl WHERE personal_data_id = $personal_data_id");
    $database->query("DELETE FROM character_reference_tbl WHERE personal_data_id = $personal_data_id");
    header('location: index.php');
}

function get_data_using_personal_data_id($personal_data_id) {
    global $database;
    $query = $database->query("SELECT * FROM  personal_data_tbl as pdt INNER JOIN educational_background_tbl as ebt ON pdt.personal_data_id = ebt.personal_data_id INNER JOIN employment_record_tbl as ert ON ebt.personal_data_id = ert.personal_data_id INNER JOIN character_reference_tbl as crt ON pdt.personal_data_id = crt.personal_data_id WHERE pdt.personal_data_id = $personal_data_id");
    return $query->fetch_object();
}

function xss_clean($action,$data) {
    global $database;
    $clean = $action == 'POST' ? $_POST[$data] : $_GET[$data];
    return $database->real_escape_string(htmlentities($clean));
}