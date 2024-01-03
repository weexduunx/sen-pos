<div>
    <x-slot name="header">
        <h4>{{ __('Profile') }}</h4>
        <h6>User Profile</h6>
    </x-slot>

    <!-- profile card -->
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update" role="form text-left">
                <div class="profile-set">
                    <div class="profile-head"></div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="150" height="150"
                                        alt="img">
                                @elseif ($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" width="150" height="150"
                                        alt="img">
                                @else
                                    <img src="{{ asset('assets/img/customer/avatar-placeholder.png') }}" width="150"
                                        height="150" alt="img">
                                @endif
                                <div class="profileupload">
                                    <input wire:model="image" type="file" id="imgInp">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('assets/img/icons/edit-set.svg') }}" alt="img"></a>
                                </div>
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ $user->name }}</h2>
                                <h4>Updates Your Photo and Personal Details.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                            <div class="@error('name')border border-danger rounded-3 @enderror">
                                <input wire:model="name" class="form-control" type="text" placeholder="Name"
                                    id="user-name">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                            <div class="@error('email')border border-danger rounded-3 @enderror">
                                <input wire:model="email" class="form-control" type="email" placeholder="@example.com"
                                    id="user-email">
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-control-label">{{ __('Phone') }}</label>
                            <div class="@error('phone')border border-danger rounded-3 @enderror">
                                <input wire:model="phone" class="form-control" type="tel"
                                    placeholder="+221771234567" id="phone">
                            </div>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location" class="form-control-label">{{ __('Location') }}</label>
                            <div class="@error('location') border border-danger rounded-3 @enderror">
                                <input wire:model="location" class="form-control" type="text" placeholder="Location"
                                    id="name">
                            </div>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-control-label">{{ __('Password') }}</label>
                            <div class="@error('password')border border-danger rounded-3 @enderror">
                                <input wire:model="password" class="form-control" type="password" id="password">
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="about">{{ 'About Me' }}</label>
                            <div class="@error('about')border border-danger rounded-3 @enderror">
                                <textarea wire:model="about" class="form-control" id="about" rows="3"
                                    placeholder="Say something about yourself"></textarea>
                            </div>
                            @error('about')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-submit me-2" wire:loading.attr="disabled"
                        wire:target='update'>
                        {{ 'Save Changes' }}
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- /profile card -->
</div>
