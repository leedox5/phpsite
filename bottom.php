<script src="/static/jquery-3.6.0.min.js"></script>
<script src="/static/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $(".delete").on("click", function() {
        if(confirm("정말로 삭제하시겠습니까?")) {
            location.href = $(this).data("uri");
        }
    });
});
</script>

</body>
</html>