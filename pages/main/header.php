<div class="header">
    <div class="toggle">
        <i id="toggle-bars" class="fa-solid fa-bars"></i>
    </div>
    <div class="header-right">
        
        <div class="bell">
            <i class="fa-regular fa-bell"></i>
        </div>
        <div class="account-info"> 
            <span>Hello, Nguyễn Minh Huy</span>
        </div>
        
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#toggle-bars').click(function() {
            document.getElementById('side-bar').classList.toggle('active');
            document.getElementById('main').classList.toggle('active'); 
        });   
    });
</script>