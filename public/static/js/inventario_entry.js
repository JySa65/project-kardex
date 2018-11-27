function search_product()
{
	var data = document.querySelector('input[name=q]');
	if (data.value == "") {
		alert("Campo Esta Vacio");
	}else{
		$.getJSON( "/project-kardex/inventory_register/search_entry/", { "q" : data.value} )
		.done(function(res) {
			if (res['rs'] == false) {
				alert("El Producto no se encuentra registrado");
			}else{
				var acum = 1;
				var tr = "";
				document.querySelector('#title_id').innerText = data.value;
				$.each(res['rs'], function(i, item){
					tr += `<tr>
					<td>${acum}</td>
					<td>${item.name}</td>
					<td><button class="btn btn-success" name="add" data-dismiss="modal" id=${item.id}><i class="fa fa-plus"></i> Agregar</button></td>
					</tr>`
					acum += 1;
				})
				document.querySelector('#id_context').innerHTML = tr;
				$("#myModal").modal('toggle');
			}
		})
	}
}

function check_input(e)
{
	if (type=="Salida") {
		var element = e.target
		var exist = parseInt(element.parentElement.parentElement.children[2].textContent);
		var value = parseInt(element.value);
		var btn = document.querySelector("button[name='save']");
		if (exist < value) {
			btn.setAttribute("disabled", "")
			element.focus()
		}else{
			btn.removeAttribute("disabled")
		}
	}
}

document.querySelector("#id_context").addEventListener('click', function(e){
	document.querySelector('input[name=q]').value = "";
	var element = e.target; 
	if (element.name === "add") {
		a = document.querySelector("#id_result")
		if (a.childElementCount !== 0) {
			for (var i = 0; i < a.childElementCount; i++) {
				var rs = a.children[i].children[0].textContent
				if (element.id == rs) {
					alert(`El Producto Ya Esta Añadido`)
					return false;
				}
			}
		}
		$.getJSON(`/project-kardex/inventory_register/search_id/${element.id}` )
		.done(function(res) {
			var dat = res['rs'];
			if (dat == false) {
				window.location.reload();
			}else{
				var tr = "";
				tr = `<tr>
				<td hidden>${dat.id}</td>
				<td>${dat.name}</td>
				<td>${res['disp']}</td>
				<td>${dat.price}</td>
				<td><input type="number" class="form-control valid" onblur="javascript:check_input(event)"
				required name="${dat.name}_${dat.id}" autocomplete="off" min="1"> </td>
				<td><button type="button" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button></td>
				</tr>`
				document.querySelector("#container").removeAttribute("hidden");
				$("#id_result").append(tr);
				var mnt_total =  document.querySelector("#id_total");
				var int_total = Number(mnt_total.textContent)
				mnt_total.textContent = int_total + Number(dat.price)
			}
		})
	}
})

document.querySelector("#id_result").addEventListener('click', function(e){
	var element = e.target;
	if (element.name === "delete") {
		element.parentElement.parentElement.remove();
	}
})

document.querySelector("#form_post").addEventListener('submit', function(e){
	a = document.querySelector("#id_result");
	if (a.childElementCount == 0) {
		alert("Debe Registrar como minimo 1 producto");
		e.preventDefault();
	}else {
		var bool=confirm("Esta Seguro que desea guardar los datos");
		if(!bool){
			e.preventDefault();
		}
	}
})


