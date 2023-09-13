<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['RoomID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-sharp fa-solid fa-person-booth"></i> Update Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $row['RoomID']; ?>" name="RoomID">
            <div class="form-group">
              <label>Room name</label>
              <input type="text" class="form-control"  placeholder="Room name" name="roomname" required value="<?php echo $row['RoomName']; ?>">
            </div>
            <div class="form-group">
              <label>Room code</label>
              <input type="text" class="form-control"  placeholder="Room code" name="roomcode" required value="<?php echo $row['RoomCode']; ?>">
            </div>
            <div class="form-group">
              <label>Capacity</label>
              <input type="number" class="form-control" placeholder="Capacity" name="capacity" required value="<?php echo $row['Capacity']; ?>">
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_room"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>






<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['RoomID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-sharp fa-solid fa-person-booth"></i> Delete Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['RoomID']; ?>" name="RoomID">
          <h6 class="text-center">Delete room record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_room"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
