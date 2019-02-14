$(document).ready(function(){
	$(".modal-title").text("Registrar Producto");

	listarProductos('');
	loadCategories();

	$("#search").on("keyup", function(){
		var search = $(this).val();
		listarProductos(search);
	});

	$("#form-product").submit(function(e){
		e.preventDefault();
		var dataForm = $(this).serialize();

		$.ajax({
			url      : base_url + 'controllers/ProductController.php',
			type     : 'POST',
			data     : dataForm,
			//dataType : 'json',
			success	 : function(response){
				
				if (response!='0') {
					listarProductos('');
					alert('La informacion del producto ha sido guardada');
				}else{
					alert('No se pudo guardar la informacion del formulario');
				}

				$("#myModal").modal('hide');
				clearForm();
				
			}
		});
	});

	$(document).on("click", ".btn-edit", function(){
		$(".modal-title").text("Editar Producto");
		var infoButton = $(this).val();
		var arrayInfoButton = infoButton.split('*');
		$("#name").val(arrayInfoButton[1]);
		$("#price").val(arrayInfoButton[2]);
		$("#stock").val(arrayInfoButton[3]);
		$("#category").val(arrayInfoButton[4]);
		loadSubCategories(arrayInfoButton[4],arrayInfoButton[5]);
		$("#action").val('update');
		$("#idProduct").val(arrayInfoButton[0]);

	});

	$(document).on("click", ".btn-add", function(){
		$(".modal-title").text("Registrar Producto");
		clearForm();
		$("#action").val('save');
	});

	$(document).on("change", "#category", function(){
		var valueCategory = $(this).val();
		if (valueCategory!='') {
			loadSubCategories(valueCategory);
		}else{
			var html = '<option value="">Seleccione Subcategoria...</option>';
			$("#subcategory").html(html);
		}

	});

});

function listarProductos(valor){
	$.ajax({
		url      : base_url + 'controllers/ProductController.php',
		type     : 'POST',
		data     : 'action=list&valor='+valor,
		dataType : 'json',
		success	 : function(response){
			var html = '';
			$.each(response, function(i, item) {
				var dataBtn = item.id +"*"+item.name+"*"+item.price+"*"+item.stock+"*"+item.category_id+"*"+item.subcategory_id;
				html +='<tr>'
			    html += '<td>'+item.name+'</td>';
			    html += '<td>'+item.price+'</td>';
			    html += '<td>'+item.stock+'</td>';
			    html += '<td>'+item.categoria+'</td>';
			    html += '<td>'+item.subcategoria+'</td>';
			   	html += '<td><button class="btn btn-info btn-sm btn-edit" value="'+dataBtn+'" data-toggle="modal" data-target="#myModal">';
			   	html += '<span class="glyphicon glyphicon-pencil"></span>';
			   	html += '</button></td>';
			   	html +='</tr>'
			});

			$("#tbListProducts tbody").html(html);
		}
	});
}

function clearForm(){
	$("#form-product")[0].reset();
	var html = '<option value="">Seleccione Subcategoria...</option>';
	$("#subcategory").html(html);

}

function loadCategories(){
	$.ajax({
		url      : base_url + 'controllers/ProductController.php',
		type     : 'POST',
		data     : 'action=getCategories',
		dataType : 'json',
		success	 : function(response){
			var html = '<option value="">Seleccione Categoria...</option>';
			$.each(response, function(i, item) {
				html += '<option value="'+item.id+'">'+item.name+'</option>';
			});

			$("#category").html(html);
		}
	});
}
function loadSubCategories(category, subcategorySelected = false){
	$.ajax({
		url      : base_url + 'controllers/ProductController.php',
		type     : 'POST',
		data     : 'action=getSubCategories&category_id='+category,
		dataType : 'json',
		success	 : function(response){
			var html = '<option value="">Seleccione Subcategoria...</option>';
			$.each(response, function(i, item) {
				if (subcategorySelected == item.id) {
					html += '<option value="'+item.id+'" selected>'+item.name+'</option>';
				}else{
					html += '<option value="'+item.id+'">'+item.name+'</option>';
				}
			});

			$("#subcategory").html(html);
		}
	});
}