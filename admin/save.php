<?php
/*

We get the following values by default from EditInPlace:

id - The DOM id
form_type - The edit field type (text, textarea, select)
old_content - The pre-edited content
new_content - The edited content

If the form_type was select then we'll also get

old_option - The pre-edited option
new_option - The edited option
old_option_text - The pre-edited display option
new_option_text - The edited display option

If any additional data was specified via the xhr_data option
then it will also be provided.

 */

// Add a little delay so that the user has a chance
// to actually see the saving message.
sleep(3);
$id				= $_POST["id"];
$id                             = str_replace("content_","",$id);
$form_type		= $_POST["form_type"];
$old_content	= rawurldecode($_POST["old_content"]);
$new_content	= rawurldecode($_POST["new_content"]);
if(isset($new_content)) {

    require_once('init.php');

    if($db->table_exists($table)) {

           $sql = "UPDATE aldo SET content='$new_content' where id = '$id'";

           $db->query($sql);

     } else {
 
              echo"Table <strong>$table</strong> doesn`t exists.";

            }//end if-else

}//end isset

$new_content = stripslashes($new_content);

echo(rawurldecode($new_content));

?>
