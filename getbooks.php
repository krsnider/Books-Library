<?php
$ret;
switch($_POST['function'])
{
  case "add_book":
    $ret = add_book($_POST['name'], $_POST['category']);
    break;
  case:
  case default:
    $ret = get_books();
    break;
}

return $ret;

function get_books()
{
  //Open books.txt
  $txt_file    = file_get_contents('./books.txt');
  //explode upon new rows.
  $rows        = explode("\n", $txt_file);
  //Buffer Header line out
  array_shift($rows);

  //get row data
  foreach($rows as $row => $data)
  {

    $row_data = explode(' ', $data);

    //Add to "book" object for each rows data.
    $info[$row]['id']           = $row_data[0];
    $info[$row]['name']         = $row_data[1];
    $info[$row]['borrowedBy']   = $row_data[2];
    $info[$row]['availability'] = $row_data[3];

    //return JSON array of books.
    return json_encode($info);

  }
}

// Add a book to the file
function add_book($name, $category)
{
  //Open books.txt
  $txt_file    = file_get_contents('./books.txt');
  //explode upon new rows.
  $rows        = explode("\n", $txt_file);
  //Buffer Header line out
  array_shift($rows);

  //For checking IDs in use
  $bigID = 0

  //Find what mod to be looking for
  switch($category)
  {
    case "Art":
      $mod = 0;
      break;
    case "Science":
      $mod = 1;
      break;
    case "Sport":
      $mod = 2;
      break;
    case "Literature":
      $mod = 3;
      break;
  }


  foreach($rows as $row => $data)
  {
    //get row data
    $row_data = explode(' ', $data);

    //For each row if it is the correct mod and greatere than the largest ID.
    if($row_data[0] % 4 == $mod && $row_data[0] > $bigID)
    {
      $bigID = $rowdata[0];
    }

    //Add 4 to the largest ID.
    $newID = $bigID + 4;

  }

  //Open the books.txt file
  $books = fopen("./books.txt", "w") or die("Unable to open file!");
  //Create the book info line to be added.
  $book = $newID . " " . $name . " " . $category . " " 1;
  //Write to books.txt
  fwrite($books, $book);
  //Close the file.
  fclose($books);

  return get_books();
}

 ?>
