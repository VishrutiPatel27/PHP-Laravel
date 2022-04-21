
 <div class="input_field"> 
            <button type="button" class="btn" name="logout"
            onclick="window.location.href='./Login.php';">Log out
            </button> 
          </div>

<script>
function deletere(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText==1)
        { 
            document.getElementById("txtHint").innerHTML = "Record deleted successfully";
            setInterval('window.location.reload()', 2000);
        }
        else
        {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }

      }
    };
    xmlhttp.open("GET", "delete.php?id=" + str, true);
    xmlhttp.send();
  }
}
</script>

<style>
body
{
    background-color: pink;

}
</style>

<?php
 require ("Config.php");
 error_reporting(0);
  $query = "SELECT * FROM student ";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  

  echo "<br>";
  //echo $total;

  if($total != 0)
{
      ?>
         <center>
         <h2>Display Records</h2>
         <p><span id="txtHint"></span></p>
         </center>
         <center>
        <table border="2" cellspacing="5" width ="90%">
            <tr>
            <th width="5%">Id</th>
            <th width="10%">Firstname</th> 
            <th width="10%">Email</th>
            <th width="10%">Address</th>
            <th width="5%">gender</th>
            <th width="10%">Designation</th>
            <th width="10%">File</th>
           <th width="10%" colspan="3">Actions</th>
            </tr>
</center>
    <?php
        //$result = mysqli_fetch_assoc($data);
        //echo "<pre>";
       // print_r($result);
       // echo "</pre>";
      while($result = mysqli_fetch_assoc($data))
      {
    ?>
        <tr>
        <td><?=$result['id']?></td>
        <td><?=$result['fname'], $result['lname']?></td>
        <td><?=$result['email']?></td>
        <td><?=$result['address']?></td>
        <td><?=$result['gender']?></td>
        <td><?=$result['designation']?></td>
        <td><?=$result['file']?></td>
        <td><a href='Edit.php?id=<?=$result['id']?>'>Edit </a></td>
        <td><a href="#" onclick="deletere(<?php echo $result['id'];?>)">Delete </a></td>
      </tr>
      <?php
      }
    }

    else
    {
      echo "No record found..";
    }
  


    ?>
    </table>
      