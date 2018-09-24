// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('0c70fe5a2a6a19394086', {
  cluster: 'eu',
  encrypted: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  alert(data.message);
});