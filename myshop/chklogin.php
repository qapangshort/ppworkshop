<?php 
session_start();
        if(isset($_POST['m_username'])){
				//connection
                  include("conn.php");
				//รับค่า user & password
                  $m_username = mysqli_real_escape_string($conn ,$_POST['m_username']);
                  $m_password = mysqli_real_escape_string($conn ,md5($_POST['m_password']));
				//query 
                  $sql="SELECT * FROM tbl_member Where m_username='".$m_username."' and m_password='".$m_password."' ";

               
                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                  	// echo mysqli_num_rows($result);
                  	// exit;
                      $row = mysqli_fetch_array($result);

                      $_SESSION["m_id"] = $row["m_id"];
                      $_SESSION["m_name"] = $row["m_fname"].' '.$row["m_name"].' '.$row["m_lname"]; //membername
                      $_SESSION["m_level"] = $row["m_level"];
                      $_SESSION["m_address"] = $row["m_address"];
                      $_SESSION["m_email"] = $row["m_email"];
                      $_SESSION["m_phone"] = $row["m_phone"];

                      if($_SESSION["m_level"]=="ADMIN"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: admin/");
                      
                      }

                      if ($_SESSION["m_level"]=="MEMBER"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        //insert login
                        $ref_m_id = $_SESSION["m_id"];

                        $sql2 = "INSERT INTO tbl_login_log 
                        (ref_m_id)
                        VALUES
                        ('$ref_m_id') ";

                        $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql " . mysqli_error());

                        Header("Location: member/");
                        // echo "member";
                      	
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>