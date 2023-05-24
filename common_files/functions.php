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
        $query .= "order by id desc limit 10";
        $sql = mysqli_query($con, $query);
        $row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return($row);
}


//function for show morning milk quantity total ( It is not using anywhere in this project)
function morningMilkSum($con){
    $userId = $_SESSION['users']['id'];
    $query = "select sum(morningQty) from d_milk where enterdby = $userId ";
    if(!empty($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        $query .= "and personId like '%$keyword%'";
    }
    $query .= "order by Id desc limit 10";
    $sql = mysqli_query($con, $query);
    return($sql);

}

//function for show evning milk quantity total ( it is not using anywhere in this project)
function evningMilkSum($con){
    $userId = $_SESSION['users']['id'];
    $query = "select sum(eveningQty) from d_milk where enterdby = $userId ";
    if(!empty($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        $query .= "and personId like '%$keyword%'";
    }
    $query .= "order by Id desc limit 10";
    $sql = mysqli_query($con, $query);
    return($sql);
    
}
// This is array_column function
function array_col($i, $y = "", $z = ""){
    $secondArray = [];
    if(!empty($i) && !empty($y) && !empty($z)){
      foreach ($i as $arr) {
        $secondArray[$arr[$z]] = $arr[$y];
      }
    }else if(!empty($i) && !empty($y) && empty($z)){
      foreach ($i as $arr) {
        $secondArray[] = $arr[$y];
      }
    }else if(!empty($i) && empty($y) && !empty($z)){
      foreach ($i as $arr) {
        $secondArray[$arr['Name']] = $arr;
      }
    }
    return $secondArray;
}




