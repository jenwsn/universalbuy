<!doctype html>
<html lang="en">

	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url();?>css/style.css">
    
    <title>Seconds</title>

      <div class="d-flex flex-column align-items-center mt-3">
        <div class="card mb-3" style="width:70%;">

            <?php
              //reconnect to database
              $this->load->database();

              //load array helper
              $this->load->helper('array');

              //retrieve item picture
              $pic_sql = "SELECT path FROM pictures WHERE item_id = ?";
              $pic_query = $this->db->query($pic_sql, array($item_id));
              $picture = $pic_query->row_array();

              if($picture['picture'] != null){
                echo "<img src='";
                echo $picture['picture'];
                echo "' class='card-img-top' alt='sampleItem' style='width:30%; align-self: center;'>";
              } else {
                echo "<img src='";
                echo base_url();
                echo "image/sampleItem.jpg' class='card-img-top' alt='sampleItem' style='width:30%; align-self: center;'>";
              }
            ?>
            
            <div class="card-header">
                <div class="d-flex d-flex justify-content-between">
                    <h2 class="card-title"><?php echo $item_title?></h2>
                    <h2>$<?php echo $cost?></h2>
                </div>
            </div>
            <div class="card-body">
                    <p class="card-text"><?php echo $item_desc?></p>
                    <p class="card-text"><small class="text-muted"><?php echo "posted by ".$username?></small></p>
                    <p class="card-text"><small class="text-muted"><?php echo $time?></small></p>
            </div>
            <div class="container">
            <form method="POST" id="comment_form">
              <div class="form-group">
              <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
              </div>
              <div class="form-group">
              <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
              </div>
              <div class="form-group">
              <input type="hidden" name="comment_id" id="comment_id" value="0" />
              <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
              </div>
            </form>
            <span id="comment_message"></span>
            <br />
            <div id="display_comment"></div>
            </div>
        </div>
      </div>

