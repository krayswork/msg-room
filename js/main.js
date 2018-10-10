// CONTACT FORM

let message = new Object();
message.loading = '';
message.success = 'Success!';
message.failure = 'Fail';


let contactForm = document.getElementById('form'),
    contactInput = contactForm.getElementsByTagName('input'),
    contactTextarea = contactForm.getElementsByTagName('textarea'),
    ajaxMessage = document.createElement('div');

ajaxMessage.classList.add('ajax');

contactForm.addEventListener('submit', function(event) {
	event.preventDefault();
	contactForm.appendChild(ajaxMessage);

	let request = new XMLHttpRequest();

	request.open('POST', 'php/sendform.php');
	// request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	let formData = new FormData(contactForm);

	request.send(formData);

	request.onreadystatechange = function() {
		if (request.readyState < 4) {
			ajaxMessage.innerHTML = message.loading;
		} else if (request.readyState === 4) {
			if (request.status == 200 && request.status < 300) {

				ajaxMessage.style.background = "url('img/ajax-loader.gif') center no-repeat";

				let timerID = setInterval(image, 2000);

				function image() {
					ajaxMessage.style.background = "url('img/document.png') center no-repeat";
					clearInterval(timerID);
				}

				let backgroundId = setInterval(imageClear, 4000)

				function imageClear() {
					ajaxMessage.style.display = "none";
					clearInterval(backgroundId);
				}

			} else {
				ajaxMessage.innerHTML = message.failure;
			}
		}
	}

	for( let i = 0; i < contactInput.length; i++) {
		contactInput[i].value = '';
		contactTextarea[i].value = '';
	}

})