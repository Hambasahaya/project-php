@extends('layouts.pelamar')

@section('content')


<div class="Edit-Profil">
        <div class="card-edit-profil">
            <div class="profile-edit-name">
                <div class="left">
                    <img src="{{ $user->photo_url ?? 'https://i.pravatar.cc/150?img=3' }}" alt="User">
                    <span>alfa</span>
                </div>
                <button type="button" class="change-photo-btn">Change Photo</button>
            </div>

            <label for="name">Name</label>
            <input type="text" name="name" value="" required>

            <label for="location">Location</label>
            <input type="text" name="location" value="">

            <label for="bio">Bio</label>
            <textarea name="bio" rows="3"></textarea>

            <label for="cv">Upload CV</label>
            <input type="file" name="cv">
            <button type="button" class="btn-blue">Upload CV</button>
        </div>

        <div class="card-edit-profil">
            <label for="linkedin">LinkedIn</label>
            <input type="text" name="linkedin" value="">

            <label for="twitter">Twitter</label>
            <input type="text" name="twitter" value="">

            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" value="">
        </div>

        <div class="card-skil">
            <label>Type of Work</label>
            <div class="type-buttons">
                <input type="radio" id="freelance" name="type_of_work" >
                <label for="freelance">Freelance</label>

                <input type="radio" id="fulltime" name="type_of_work" >
                <label for="fulltime">Full-Time</label>
            </div>

            <label for="skills">Skill</label>
            <textarea name="skills" rows="3"></textarea>
        </div>

        <button type="submit" class="save-btn">Save Profile</button>
    </form>
</div>
@endsection
