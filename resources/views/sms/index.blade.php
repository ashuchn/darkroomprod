<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Index</title>
    <style>
         body{
            background:
                /* top, transparent black, faked with gradient */ 
                linear-gradient(
                rgba(0, 0, 0, 0.7), 
                rgba(0, 0, 0, 0.7)
                ),
                /* bottom, image */
                url(https://images.unsplash.com/photo-1614030424754-24d0eebd46b2);
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                           Send Message
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sms.send') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Enter Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Enter Phone Number</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
                                </div>
                                <label>Enter Message</label>
                                <div class="form-group">
                                    <textarea name="message" class="form-control"  id="" rows="10"></textarea>
                                    {{-- <input type="tel" class="form-control" placeholder="Enter Phone Number"> --}}
                                </div>
                                    <button type="submit" class="btn btn-primary mt-2">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>