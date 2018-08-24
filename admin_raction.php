<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser']))
{
    header("Location:admin_login.html");
    exit();
}

include "db.php"; 
switch($_GET['a'])
{
    case "search_infor_raction":
    { 
        if(isset($_REQUEST['studentID']) && $_REQUEST['studentID']!="")
        {
            $studentID = $_REQUEST['studentID'];

            $sql = "SELECT * FROM student WHERE studentID = '$studentID'";

            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_row();
                $studentName = $row[1];
                echo $studentID . $studentName ." report : <br>";
            
                $sql = "SELECT * FROM sreport WHERE studentID = '$studentID'";
                $result = $conn->query($sql);
                echo "<table class='tb01'>";
                echo "<tr><th>cno</th><th>cname</th><th>mark</th><th></th><th></th></tr>";
                while ($row = $result->fetch_row()) 
                {
                    echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
                     <td><input type = 'button' onclick = 'editInfo_searchNew(\"$row[0]\", \"$row[1]\")' value ='edit'></td><td><input type = 'button' onclick = 'deleteInfo_search(\"$row[0]\", \"$row[1]\")' value ='delete'></td></tr>";
                }
            }
        }
        else
        {
            echo "wrong studnetID";
        }
        
        break;
    }

    case "search_deleteInfo":
    {
        $cno = $_GET['cno'];
        $studentID = $_GET['studentID'];
        $sql = "DELETE FROM sreport WHERE studentID = '$studentID' AND cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "delete report !";
            }
        break;
    }

    case "submitMark":
    {
        $mark= $_REQUEST['mark'];
        $studentID = $_REQUEST['studentID'];
        $cno = $_REQUEST['cno'];

        $sql = "UPDATE sreport SET mark = '$mark' WHERE studentID =  $studentID AND cno = $cno"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
            { 
                echo "edit report !";
            }
        break;
    }
    case "editInfo_face_searchNew":
    {
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        
        echo "studentID :" . $studentID . "& cno:" . $cno;
        echo "<br>";
        echo "mark: <input id = 'markID' type = 'text' name ='mark'>";
        echo "<br>";
        echo "<input type = 'button' onclick = 'submitMark_searchNew(\"$studentID\", \"$cno\")' value = 'submit'>";
        break;
    }

    case "editInfo_face":
    {
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        
        echo "studentID :" . $studentID . "& cno:" . $cno;
        echo "<br>";
        echo "mark: <input id = 'markID' type = 'text' name ='mark'>";
        echo "<br>";
        echo "<input type = 'button' onclick = 'submitMark(\"$studentID\", \"$cno\")' value = 'submit'>";
        break;
    }
    
    case "addNew":
    {
        $studentID = $_REQUEST['studentID'];
        $studentName= $_REQUEST['studentName'];
        $age = $_REQUEST['age'];
        $gender = $_REQUEST['gender'];
        $department = $_REQUEST['department'];
        $password = $_REQUEST['studentName'];

        $sql = "SELECT * FROM student WHERE studentID = '$studentID' "; 
        $result = $conn->query($sql);
        if($result->num_rows ==1)
        {
            echo 'the student is already exist!';
        }
        else
        {
            $sql = "INSERT INTO student (studentID, studentName, age, gender, department, password) VALUES('$studentID', '$studentName', '$age', '$gender', '$department', '$password')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "insert new student successfully!";
            }else
            {
                echo "insert failed";
            }
        }
        break;
    }
    case "all_students_info":
    {
        $sql = "SELECT * FROM student ORDER BY studentID";
        $result = $conn->query($sql);
        echo "<table class='tb01'>";
        echo "<tr><th>studentID</th><th>studentName</th><th>age</th><th>gender</th><th>department</th><th></th></tr>";
        while ($row = $result->fetch_row()) 
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
            <td><input type='button' onclick='deleteNew(\"$row[0]\")' value='delete'></td></tr>";
        }
        break;
    }
    case "deleteNew":
    {
        $studentID = $_REQUEST['studentID'];
        $sql = "DELETE FROM student WHERE studentID = '$studentID'"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
        { 
            $sql = "DELETE FROM sreport WHERE studentID = '$studentID'";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "delete";
            }
        }
        break;
    }

    case "grade_management":
    {
        $page = isset($_GET['page'])?$_GET['page']:1;

        $pagesize = 10;
        $offset = $pagesize * ($page-1);

        $sql = "SELECT * FROM sreport";
        $result = $conn->query($sql);
        $total_rows = $result->num_rows;
        $total_page = ceil($total_rows/$pagesize);

        $sql = "SELECT * FROM sreport ORDER BY studentID limit $offset, $pagesize";
        $result = $conn->query($sql);

        echo "<table class='tb01'>";
        echo "<tr><th>studentID</th><th>cno</th><th>cname</th><th>mark</th><th><input type = 'button' onclick = 'addGrade_face()' value ='ADD'></th><th></th></tr>";
        while ($row = $result->fetch_row()) 
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
            <td><input type = 'button' onclick = 'editInfo(\"$row[0]\", \"$row[1]\")' value ='edit'></td><td><input type = 'button' onclick = 'deleteInfo(\"$row[0]\", \"$row[1]\")' value ='delete'></td></tr>";
        }
        echo "</table>";


        echo "<div style = 'text-align:center;'>";
        echo "<input type ='button' onclick = NextPage(1) value = 'first page'>";
        echo '&nbsp';
        if($page > 1)
        {
            $num = $page - 1;
            echo "<input type ='button' onclick = NextPage($num) value = '<<pre page'>";
            echo '&nbsp';
        }
        if($page < $total_page)
        {
            $num = $page + 1;
            echo "<input type ='button' onclick = NextPage($num) value = '>>next page'>";
            echo '&nbsp';
        }
        echo "<input type ='button' onclick = NextPage($total_page) value = 'last page'>";
        echo "</div>";
        break;
    }

    case "add_grade_face":
    {
        echo 
        "<label for 'studentID'>studentID: </label>
        <input id = 'studentID' type = 'text' name = 'studentID'>
        <br>
        <label for 'cno'>cno:</label>
        <input id ='cno' type = 'text' name = 'cno'>
        <br>
        <label for 'cname'>cname:</label>
        <input id = 'cname' type = 'text' name ='cname'>
        <br>
        <label for 'mark'>mark:</label>
        <input id = 'mark' type = 'text' name ='mark'>
        <br>
        <input type = 'button' onclick = 'addGrade()' value = 'add'>";
        break;
    }

    case "add_grade":
    {
        $studentID = $_REQUEST['studentID'];
        $cno = $_REQUEST['cno'];
        $cname= $_REQUEST['cname'];
        $mark= $_REQUEST['mark'];
        if( $studentID == ""|| $cno == ""|| $cname == "" || $mark == "" )
        {
            echo "not compelte!";
        }
        else
        {
            $sql = "SELECT * FROM sreport WHERE studentID = '$studentID' AND cno = '$cno' "; 
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                echo "the course mark is already exist!";
            }
            else
            {
                $sql = "INSERT INTO sreport (studentID, cno, cname, mark) VALUES('$studentID', '$cno', '$cname', '$mark')";
                $result = $conn->query($sql);
                if ($result === TRUE)
                { 
                    echo "add new report!";
                }else
                {
                    echo "insert failed";
                }
            }

        }
        break;
    }

    case "course_management":
    {
        $sql = "SELECT * FROM course ORDER BY cno";
        $result = $conn->query($sql);
        echo "<table class='tb01'>";
        echo "<tr><th>cno</th><th>cname</th><th><input type = 'button' onclick = 'addCourse_face()' value = 'AddCourse'></th></tr>";
        while ($row = $result->fetch_row()) 
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td>
            <td><input type = 'button' onclick = 'deleteCourse(\"$row[0]\")' value = 'delete'></td></tr>";

        }
        break;
    }

    case "add_course_face":
    {
      echo "<label for='cno'>cno:</label>
            <input id = 'cno' type = 'text' name = 'cno'>
            <br>
            <label for='cname'>cname:</label>
            <input id = 'cname' type = 'text' name ='cname'>
            <br>
            <input type = 'button' onclick = 'addCourse()'' value = 'add'>";
            break;
    }

    case "addCourse":
    {
        $cno = $_REQUEST['cno'];
        $cname= $_REQUEST['cname'];

        if(!$cno||!$cname)
        {
            echo "not complete!";
        }
        else
        {
            $sql = "SELECT * FROM course WHERE cno = '$cno' "; 
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                echo "the course is already exist";
            }

            $sql = "INSERT INTO course (cno, cname) VALUES('$cno', '$cname')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "add new course!";
            }else
            {
                echo "insert failed";
            }
        }
        break;
    }
    case "deleteCourse":
    {
        $cno = $_REQUEST['cno'];
        $sql = "DELETE FROM course WHERE cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "delete course!";
            }
        break;
    }
}
$conn->close();
 ?>