<?php
/**
 *
 */
class Bukutamu
{


  // function untuk insert pesan user
  public function insert()
  {
    $qryinsert = "INSERT INTO bukutamu (guest_name, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    $result    = $this->mysqli_query->qryinsert;
  }

  public function _view()
  {

  }

  public function _delete()
  {
    # code...
  }

}


?>
