document.querySelector('form').onsubmit = check;

function check(event) {
	event.preventDefault();
	var data = document.querySelector('form').elements;
	
	var content = 
	{
		'nacionality': data.nacionality.value,
		'cedula': data.cedula.value,
		'name': data.name.value,
		'last_name': data.last_name.value,
		'email': data.email.value,
		'is_active': data.is_active.checked,
		'is_superuser': data.is_superuser.checked,
		'is_supervise': data.is_supervise.checked,
		'is_worker': data.is_worker.checked,
		'csrftoken': data.csrftoken.value,
		'method': document.querySelector('form').method
	}

	var myHeaders = new Headers(
	{
		"Content-Type": "application/json",
		"Accept": "application/json",
		"X-Custom-Header": "ProcessThisImmediately",
	});

	var myInit = 
	{ 
		method: 'POST',
		headers: myHeaders,
		credentials: "same-origin",
		mode: 'same-origin',
		body: JSON.stringify(content) 
	};

	var url = 'register_account/check';

	var myRequest = new Request(url, myInit);

	fetch(myRequest)
	.then(response => {
		return response.text();
	})
	.then(data => {
		console.log(data)
	})
	.catch(ex => {
		console.log("parsing failed", ex);
	});
}