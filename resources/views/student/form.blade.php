<div class="row">
    @php $data = isset($student) ? $student : null; @endphp

    <div class="col-md-6 mb-3">
        <label>Roll No</label>
        <input type="text" name="roll_no" class="form-control" value="{{ old('roll_no', $data->roll_no ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>PR No</label>
        <input type="text" name="pr_no" class="form-control" value="{{ old('pr_no', $data->pr_no ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $data->name ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Phone</label>
        <input type="text" name="ph_no" class="form-control" pattern="[0-9]{10}" maxlength="10" value="{{ old('ph_no', $data->ph_no ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $data->email ?? '') }}" required>
    </div>

    <div class="col-md-12 mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control" required>{{ old('address', $data->address ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label>10th School Name</label>
        <input type="text" name="school_10th_name" class="form-control" value="{{ old('school_10th_name', $data->school_10th_name ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>10th School Address</label>
        <textarea name="school_10th_address" class="form-control">{{ old('school_10th_address', $data->school_10th_address ?? '') }}</textarea>
    </div>

    <div class="col-md-4 mb-3">
        <label>10th %</label>
        <input type="number" step="0.01" min="0" max="100" name="school_10th_percentage" class="form-control" value="{{ old('school_10th_percentage', $data->school_10th_percentage ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>12th School Name</label>
        <input type="text" name="school_12th_name" class="form-control" value="{{ old('school_12th_name', $data->school_12th_name ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>12th School Address</label>
        <textarea name="school_12th_address" class="form-control">{{ old('school_12th_address', $data->school_12th_address ?? '') }}</textarea>
    </div>

    <div class="col-md-4 mb-3">
        <label>12th %</label>
        <input type="number" step="0.01" min="0" max="100" name="school_12th_percentage" class="form-control" value="{{ old('school_12th_percentage', $data->school_12th_percentage ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Bachelor College Name</label>
        <input type="text" name="bachelor_college_name" class="form-control" value="{{ old('bachelor_college_name', $data->bachelor_college_name ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Bachelor College Address</label>
        <textarea name="bachelor_college_address" class="form-control">{{ old('bachelor_college_address', $data->bachelor_college_address ?? '') }}</textarea>
    </div>

    <div class="col-md-4 mb-3">
        <label>Bachelor %</label>
        <input type="number" step="0.01" min="0" max="100" name="bachelor_percentage" class="form-control" value="{{ old('bachelor_percentage', $data->bachelor_percentage ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Current Course</label>
        <input type="text" name="current_course" class="form-control" value="{{ old('current_course', $data->current_course ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Current Status</label>
        <select name="current_status" class="form-control" required>
            <option value="">Select Status</option>
            <option value="Studying" {{ old('current_status', $data->current_status ?? '') == 'Studying' ? 'selected' : '' }}>Studying</option>
            <option value="Working" {{ old('current_status', $data->current_status ?? '') == 'Working' ? 'selected' : '' }}>Working</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Final Year Passed</label>
        <input type="text" name="final_year_passed" class="form-control" value="{{ old('final_year_passed', $data->final_year_passed ?? '') }}">
    </div>
</div>
