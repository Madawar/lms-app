<?php
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
?>
<table class="table-auto w-full border-collapse ">
    <thead class="">
        <tr>
            <th>Staff</th>
            <th>Role</th>
            @foreach ($courses as $course)
                <th colspan="2">{{ $course->name }}</th>
            @endforeach


        </tr>
    </thead>
    <tbody>

            <tr>
                <td></td>
                <td></td>
                @foreach ($courses as $course)
                    <td>Done On</td>
                    <td>Expiry</td>
                    @endforeach

            </tr>


        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name }}</td>
                @foreach ($courses as $course)
                    <x-time-field :course="$course->id" :user="$user->id" />
                @endforeach
            </tr>
        @endforeach


    </tbody>
</table>
