<?php
// function for find the person id by name for add_milk_Qty
function getpersonId($con){
    $userId = $_SESSION['users']['id'];
    $query = "select * from d_person where enterdby = $userId";
    $sql = mysqli_query($con, $query);
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_all($sql, MYSQLI_ASSOC);

}
    return($row);
}


//function for fetch the d_milk data for show_milk_list

function showmilkData($con){
        $row =[];        
        $userId = $_SESSION['users']['id'];
        $query = "select * from d_milk where enterdby = $userId ";
        if(!empty($_POST['keyword'])){
            $keyword = $_POST['keyword'];
            $query .= "and personId like '%$keyword%'";
        }
        $sql = mysqli_query($con, $query);
        $row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return($row);
}

//function for view the single person data
function singlePersonData($con){
    $query = "select * from d_milk where personId = ";
}




