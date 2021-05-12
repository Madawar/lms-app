<div>
    <x-forms.input label="Staff Name" placeholder="Staff Name" name="staff.name" />

    <div class="flex flex-col md:flex-row md:space-x-2">
        <div class="flex-auto">
            <x-forms.input label="Email" placeholder="Email" name="staff.email" />
        </div>
        <div class="flex-auto">
            <x-forms.select label="Staff Role" placeholder="Staff Role"
                name="staff.role_id"
                :options="$roles" />
        </div>
    </div>
</div>
