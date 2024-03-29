<?php
error_reporting(0);
$userid = $_GET['id'];
$return = $_GET['return'];
$servername = "localhost";
$username = "root";
$password = "";
$db = "std_dbms";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Register WHERE UserID ='$userid'";
 
$result = $conn->query($sql);
// output data of each row
$data = $result->fetch_assoc(); 

?>
<style>
    .input {
            width: 320px;
            height: 25px;
            border-radius: 7px;
            font-size: 20px;
            font-family: inherit;
        }

        .font_design {
            font-size: 25px;
            font-family: -webkit-pictograph;
        }
        .input-type {
            background-origin: padding-box;
            border-radius: 10px;
        }

        .phone {
            background-origin: padding-box;
            border-radius: 7px;
        }
    .my-button{
        width: 100px;
        height: 30px;
        font-family: arial;
        background-color: greenyellow;
        color: red;
        text-align: center;
        font-size: 20px;
        border-radius: 0px 30px
    }
    .my-button:hover {
        background-color: yellow;
    }
</style>
<div class="form1">
            <form name="form" action="update.php" method="post">
			<input name="UserID" type="hidden" value="<?php echo $userid; ?>" />
			<input name="return" type="hidden" value="<?php echo $return ;  ?>" />
			<!--Table-->
                <table class="font_design" align="center" bordercolor="pink" bgcolor="gray" style="border-radius:12px" height="400">
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            <input id="textusername" type="text" name="UserName" required value="<?php echo $data['UserName']; ?>" class="input" required placeholder="Type Name" />
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Father Name
                        </td>
                        <td>
                            <input id="textfathername" type="text" name="FatherName" required value="<?php echo $data['FatherName']; ?>" class="input" required placeholder="Type Father Name" />
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            <input id="textemail" type="email" name="Email" required value="<?php echo $data['Email']; ?>" class="input" required placeholder="Type Email" />
                        </td>

                    </tr>
                    </tr>

                    <tr>
                        <td>
                            Phone No.
                        </td>
                        <td>
                            <select name="PhoneCode" required class="phone" required>
                                <option selected hidden value="<?php echo $data['PhoneCode']; ?>"><?php echo $data['PhoneCode']; ?></option>
                                <option value="92">92</option>
                                <option value="91">91</option>
                                <option value="001">001</option>
                            </select>
                            <input type="phone" name="Phone" value="<?php echo $data['Phone']; ?>" class="phone" required placeholder="Type Phone">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Addres
                        </td>
                        <td>
                            <input id="text" type="text" name="Address" required value="<?php echo $data['Address']; ?>" class="input" required placeholder="Type Address">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Age
                        </td>
                        <td>
                            <input id="text" type="text" name="Age" required value="<?php echo $data['Age']; ?>" class="input" required placeholder="Type Age">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Class
                        </td>
                        <td>
                            <select name="Class" required class="input" required>
                            <option selected hidden value="<?php echo $data['Class']; ?>"><?php echo $data['Class']; ?></option>
                            <option>One</option>
                            <option>Two</option>
                            <option>Three</option>
                            <option>Four</option>
                            <option>Five</option>
                            <option>Six</option>
                            <option>Seven</option>
                            <option>Eight</option>
                            <option>Nine</option>
                            <option>Ten</option>
                            <option>Eleven</option>
                            <OPTION>Twelve</OPTION>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender
                        </td>
						<!--PHP Radio Button-->
						<?php
						$Male = "";
						$Female = "";
						
						if($data['Gender']=='Male'){
							$Male = "checked";
						}
						else{
							$Female = "checked";
						}
						
						?>
                        <td>
                            <input <?php echo $Male; ?> type="radio" name="Gender" value="Male" required>Male</input>
                            <input <?php echo $Female; ?> type="radio" name="Gender" value="Female" required>Female</input>
                        </td>
                    </tr>
					<!--Button-->
                    <tr>
                        <td>
                            &nbsp;
                        </td>
						<td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="submit" class="my-button"/>
                        </td>
                        
                    </tr>
                </table><br>
            </form>
        </div>