<!DOCTYPE html>
<html lang="en">
<head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
*
{
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    padding: 0;
    
    

}

header {

    background-color: #6d9d0b;
  width: 100%;
  padding: 10px;
  
}

 h1
{
    
    text-align: center;
    color: #f2f2f2;
    padding: 10px;
}


body
{
   background-color:#dddddd;
}

 table {

margin: 0 auto;
width: 80%;
height: 500px;
padding: 0 auto;




 
}

th, td {
border: 1px solid #dddddd;
padding: 12px;
text-align: left;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.03) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}

th {
background-color: #6d9d0b;
color: white;
}

tr {
background-color: #f2f2f2;
}

a {
background-color: #6d9d0b;
color: white;
padding: 10px;
text-decoration: none;
border-radius: 4px;
transition: 0.2s ease-in-out;
box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

.maintable
{
    margin: 80px;
    margin-top: 50px;
    background-color: ghostwhite;
    padding:50px;
    align-items: center;
    border-radius: 30px;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px inset, rgba(0, 0, 0, 0.09) 0px -3px 5px inset;

    
    
   
}

h1
{
    font-family: 'Poppins',sans-serif;
    color: lightslategray;
    text-align: left;
    padding-left: 120px;
    margin:0 auto;
    margin-top: 10px;
}

.backbtn
{
    margin-left: 120px;
   margin-bottom: 30px;
   margin-bottom: 20px;
}



a:hover {
background-color: #72eb3a;
}

@media (max-width: 600px) {
   table {
      width: 100%;
   }
   th, td, a {
      display:flex;
      border: none;
   }
   th {
      background-color: #337ab7;
      color: white;
   }
   tr:nth-child(even) {
      background-color: #f2f2f2;
   }
}

</style>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


   
 
         
    

<div class="maintable">
<a href="/GastronomyWeb/adminpage.php" class="backbtn">Return to Admin Page</a>
    <h1>Users: </h1>
   
    <table >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Username</th>
           
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </div>
        <?php
        include_once '../repository/userRepository.php';
        $userRepository  = new UserRepository();
        $users = $userRepository->getAllUsers();
        foreach($users as $user){
           echo 
           "
           <tr>
               <td>$user[userid]</td>
               <td>$user[name]</td>
               <td>$user[surname]</td>
               <td>$user[email]</td>
               <td>$user[username]</td>
               
               <td><a href='edit.php?id=$user[userid]'>Edit</a></td>
               <td><a href='delete.php?id=$user[userid]'>Delete</a></td>

           </tr>
           ";
        }
        
        
        ?>
    </table>
</body>
</html>