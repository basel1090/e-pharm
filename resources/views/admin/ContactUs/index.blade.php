@extends("layouts.admin")
@section("title", "Manage Contact-Us")
@section("content")

    <div class="table-scrollable">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Name</th>
                <th> Email</th>
                <th> Subject</th>
                <th> Message</th>
            </tr>
            </thead>
            <tbody>

            @foreach($contacts as $contact)
                    <tr>
                    <td> {{$contact->id}} </td>
                    <td> {{$contact->name}} </td>

                    <td>{{$contact->email}}</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    <td>
{{--                        @include("shared.msg")--}}

                        <form method="post" action="{{ route('contacts.destroy', $contact->id) }}">
{{--                            <a href="{{ route("contact.show", $contact->id) }}" class="btn btn-info btn-sm"><i--}}
{{--                                    class='fa fa-eye'></i></a>--}}

{{--                            <a href="{{ route("contact.edit", $contact->id) }}" class="btn btn-primary btn-sm"><i--}}
{{--                                    class='fa fa-edit'></i></a>--}}


                            <button onclick='return confirm("Are you sure ?")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    @csrf
                    @method("DELETE")
                    </form>
                    </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
@endsection
