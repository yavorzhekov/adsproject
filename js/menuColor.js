var townId = <?php echo json_encode($townId); ?>;
	var catId = <?php echo json_encode($catId); ?>;

	$(".categCats ul li a[catid="+catId+"]").addClass("selCateg");
	$(".townsCats ul li a[townid="+townId+"]").addClass("selTown");