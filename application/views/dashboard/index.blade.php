@layout('layouts/main')

@section('navigation')
@parent
<li><a href="user/logout">Logout</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span3">

    </div>
    <div class="span9">
        <h1>Distance - Test Schedule Manager</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
        <h3>Add Time Slot</h3>
        <form method="POST" action="dashboard/insert" id="insert_section" enctype="multipart/form-data">
            <label>Date</label>
            <input type="text" name="date" id="date" class="datepicker"/>
            <label>Time</label>
            <input type="text" name="time" id="time"/><span class="help-inline">hh:mm format</span>
            <label>Total Registrations Allowed</label>
            <input type="text" name="number" id="number"/><span class="help-inline">blank or 0 for unlimited</span>
            <label>Short Title</label>
            <input type="text" name="title" id="title"/><span class="help-inline">(e.g. "Session 1")</span>
            <br/>
        </form>
        <div>
            <button type="button" onclick="$(insert_section).submit();" class="btn btn-primary">Save</button>
        </div>
    </div>
    <div class="alert alert-info">
        <h3 class="alert-heading">Scheduled Time Slots</h3>
        <table class="table">
            <tr><th>Title</th><th>Date</th><th>Time</th><th>Number</th><th>Delete</th></tr>
            @forelse ($slots as $slots)
            <form method="POST" action="dashboard/delete" enctype="mulitpart/form-data">
                <tr>
                    <td>{{ $slots->title }}</td><td>{{ $slots->datetimeslot }}</td><td>{{ $slots->time}}</td><td>{{ $slots->numallowed}}</td>
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <input name="slot_id" type="hidden" value=" {{ $slots->id }}"/>
                    </td>
                </tr>
            </form>
            @empty 
            <p>Nothing this week</p>
            @endforelse
        </table>
    </div>
    </div>
</div>
@endsection