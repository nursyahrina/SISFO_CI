<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between bg-primary">
            <h4 class="my-auto font-weight-bold text-light">Chat Room</h4>
        </div>
        <div class="card-body m-0 p-0">
            <div id="wrapper" class="d-flex flex-column bg-light">
                <div id="menu" class="d-flex justify-content-between">
                    <p class="welcome">Welcome, <b><?php echo $nama_user; ?></b>!</p>
                    <p class="logout"><a class="btn btn-danger" id="exit" href="#">Exit Chat</a></p>
                </div>

                <div id="chatbox">
                    <?php echo $contents; ?>
                </div>

                <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" />
                    <input name="submitmsg" type="submit" id="submitmsg" value="Send" class="btn btn-warning" />
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    var BASE_URL = "<?php echo base_url(); ?>";

    // jQuery Document for chat app
    $(document).ready(function() {
        $("#submitmsg").click(function() {
            var clientmsg = $("#usermsg").val();
            $.post(BASE_URL + 'chat/post', {
                text: clientmsg
            });
            $("#usermsg").val("");
            return false;
        });

        function loadLog() {

            var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request

            $.ajax({
                url: BASE_URL + "assets/log/log.html",
                cache: false,
                success: function(html) {
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div

                    //Auto-scroll           
                    var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                    if (newscrollHeight > oldscrollHeight) {
                        $("#chatbox").animate({
                            scrollTop: newscrollHeight
                        }, 'normal'); //Autoscroll to bottom of div
                    }
                }
            });
        }

        setInterval(loadLog, 2500);

        $("#exit").click(function() {
            var exit = confirm("Are you sure you want to end the session?");
            if (exit == true) {
                window.location = BASE_URL + "chat/exit";
            }
        });
    });
</script>