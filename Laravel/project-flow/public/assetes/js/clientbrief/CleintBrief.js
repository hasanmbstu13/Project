// An empty object
var Ajax = {};

Ajax.createXHR = function(url, options) {
	// default value
	var xhr = false;
	
	if(window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	}

	if(xhr) {
		options = options || {};
		options.method = options.method || "GET";
		// assign data for options.data if the request is post or give the null for get request
		options.data = options.data || null;
		// options.data = options.data;

		if(options.data) {
			var qstring = [];

			for (var key in options.data) {
				qstring.push(encodeURIComponent(key)+"="+encodeURIComponent(options.data[key]));
			}

			options.data = qstring.join("&");
		}

		xhr.onreadystatechange = function(){
			if (xhr.readyState == 1) {
				if(options.before) {
					options.before.call(xhr);
				}
			}
			if ((xhr.readyState == 4) && (xhr.status == 200 || xhr.status == 304)) {
				var contentType = xhr.getResponseHeader('Content-Type');

				if (options.complete) {
					if(contentType == "application/json") {
						options.complete.call(xhr, JSON.parse(xhr.responseText));
					} else if (contentType == "text/xml" || contentType == "application/xml"){
						options.complete.call(xhr, xhr.responseXML);
					} else {
						options.complete.call(xhr, xhr.responseText);
					}
				}
			}
		};
		xhr.open(options.method, url, true);
		return xhr;
	} else {
		return false;
	}
};

Ajax.ajax = function (url, options) {
	var xhr = Ajax.createXHR(url,options);

	if(xhr) {
		// Set a header request to give the message to the header that's its an ajax request
		// that's header can diffn between regular & ajax request
		xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
		// we set content-type header for post request
		if (options.method.toUpperCase() == "POST") {
			// for post request always make sure for content type header
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		}
		// send data for post request
		// options.data is worked for both get & post request
		// options.data is not working because its a object send method expects query string of data with urlencoded keys and values
		// so we need to parse the object in key value pairs
		// & properly encoded for url query string
		xhr.send(options.data);
		// server read the data as like email is the key
		// xhr.send("email=ajax@gmail.com");
	}
};

Ajax.flash = function(elem) {
	elem.style.backgroundColor = "yellow";

	window.setTimeout(function(){
		elem.style.backgroundColor = "white";
	}, 300);
};