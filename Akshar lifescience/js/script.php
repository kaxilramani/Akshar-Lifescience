<!-- <script src="js/sweetalert.min.js"></script>
<?php
 if(isset($_SESSION['status']) && $_SESSION['status'] !='')
 {
   ?>
     <script>
       swal({
         title: "<?php echo $_SESSION['status'];?>",
        //  text: "You clicked the button!",
         icon: "<?php echo $_SESSION['status_code']; ?>",
         button: "OK Done!",
});
    </script>
    <?php
      unset($_SESSION['status']);
}
    ?> -->