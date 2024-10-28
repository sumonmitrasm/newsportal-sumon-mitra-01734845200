$(document).ready(function(){
    //.......................Admin............................................
	$(document).on("click",".updateAdminStatus",function(){
		var status = $(this).children("i").attr("status");
		var value_id = $(this).attr("value_id");
		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			 },
  			 type:'post',
  			 url:'/admin/update-admin-status',
  			 data:{status:status,value_id:value_id},
  			 success:function(resp){
  			 	if (resp['status']==0) {
					$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
  			 },error:function(){
  			 	alert("Error");
  			 }
		});
	});

	// delete code.............................................................
	$(".confirmDelete").click(function(){
		var module = $(this).attr('module');
		var moduleid = $(this).attr('moduleid');
		//alert(moduleid);die;
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		  }).then((result) => {
			if (result.isConfirmed) {
			  Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
			  )
			  window.location = "/admin/delete-"+module+"/"+moduleid;
			}
		  })
	});



	//update post status....
	$(document).on("click",".updatePostStatus",function(){
		var status = $(this).children("i").attr("status");
		//alert(status);die;
		var value_id = $(this).attr("value_id");
		//alert(value_id);die;
		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			 },
  			 type:'post',
  			 url:'/admin/update-post-status',
  			 data:{status:status,value_id:value_id},
  			 success:function(resp){
  			 	if (resp['status']==0) {
					$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
  			 },error:function(){
  			 	alert("Error");
  			 }
		});
	});	
});