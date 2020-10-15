Hello <i>Game Store</i>,
<p>Your have a request to become publisher from {{ $demo->email }}</p>
 
<p><u>Publisher Info:</u></p>
 
<div>
<p><b>Name:</b>&nbsp;{{ $demo->name }}</p>
<p><b>Phone:</b>&nbsp;{{ $demo->phone }}</p>
<p><b>Address:</b>&nbsp;{{ $demo->address }}</p>
</div>
 
<p><u>Description:</u></p>
 
<div>
<p>{{ $demo->description }}</p>
</div>
 
Thank You,
<br/>
<i>Game Store's MailController</i>