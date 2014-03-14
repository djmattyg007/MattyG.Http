The MattyG HTTP Library

This module is a pair of classes designed for use with PHP web projects and
APIs that operate over the HTTP protocol. It contains two classes, Request
and Response.

Request is initialised by passing a copy of the $_SERVER, $_GET and $_POST
superglobals. It does not have a very expansive interface at present, but
does provide a common interface for accessing GET and POST values.

Response is used for preparing and sending your entire response to the client.
It provides an interface to prepare HTTP headers, the content you wish to
send, and finally to actually send the whole response.

This module is still a work in progress.


Contributions

All contributions are welcome. By submitting a contribution, you must
acknowledge and accept that your work will be released into the public domain
like the rest of the work is.


License

This module is released into the public domain. Full details can be found in
LICENSE.txt.

