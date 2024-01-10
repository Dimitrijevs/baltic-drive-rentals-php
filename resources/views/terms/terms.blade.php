@extends('layout.layout')

@section('content')
    @if (auth()->user()->is_admin)
        <div class="d-flex justify-content-center mb-4" style="margin-top: 120px">
            <a href="{{ route('terms.create') }}" class="bg-primary text-warning h2 py-2 px-3 rounded me-2"><i class="bi bi-plus-circle"></i></a>
        </div>
    @endif

    <section class="mb-5">
        <h1 class="mb-5 header text-center">Rental Terms and Conditions</h1>
        <div class="container">
            <div class="row">
                <div class="card bg-primary text-light mb-4 img-zoom">
                    <div class="card-body text-center">
                        @if (auth()->user()->is_admin)
                            <div class="mb-2 d-flex justify-content-center">
                                <a href="" class="bg-primary text-warning h2 py-2 px-3 rounded me-2"><i
                                        class="bi bi-pen"></i></a>
                                <a href="" class="bg-primary text-warning h2 py-2 px-3 rounded me-2"><i
                                        class="bi bi-trash"></i></a>
                            </div>
                        @endif
                        <h3 class="card-title mb-3">1. Rental Agreement</h3>
                        <p class="card-tex text-light">
                            This Agreement stands as a legally binding contract between SIA "Baltic Drive Rentals,"
                            hereinafter referred to as the "Company," and the Renter, whether an individual or entity,
                            establishing the terms and conditions for the rental of a vehicle. The act of renting a vehicle
                            implies the Renter's explicit agreement and commitment
                            to adhere to the stipulations outlined within this document.
                        </p>
                    </div>
                </div>

                <div class="card bg-primary text-light mb-4 img-zoom">
                    <div class="card-body text-center">
                        <h3 class="card-title mb-3">2. Vehicle Rental</h3>
                        <p class="card-tex text-light">
                            The commitment of the Company to prioritize the utmost convenience for the Renter is
                            underscored by our dedication to providing the selected vehicle model or an equivalent one.
                            This commitment is contingent upon availability and is subject to the Company's discretion,
                            ensuring a seamless transition into the rental period. The rental period itself
                            is meticulously observed, commencing and concluding precisely as specified in the reservation.
                            This meticulous adherence to the agreed-upon timeline is aimed at enhancing your overall rental
                            experience,
                            reflecting our commitment to precision, reliability, and customer satisfaction.
                        </p>
                    </div>
                </div>

                <div class="card bg-dark text-light mb-4 img-zoom">
                    <div class="card-body text-center">
                        <h3 class="card-title mb-3">3. Renter Requirements</h3>
                        <p class="card-tex text-light">
                            To fulfill the rental requirements, the Renter is obligated to meet the Company's
                            minimum age criterion and must hold a valid driver's license issued in their name.
                            Furthermore, it is imperative for the Renter to provide evidence of
                            insurance coverage or opt to purchase insurance directly from the Company for the duration of
                            the rental.
                            These stipulations are in place to ensure compliance with legal and safety standards,
                            fostering a secure and responsible rental environment. The Company values the well-being of
                            all parties involved and seeks to establish a foundation of trust and responsibility throughout
                            the rental process.
                        </p>
                    </div>
                </div>

                <div class="card bg-primary text-light mb-4 img-zoom">
                    <div class="card-body text-center">
                        <h3 class="card-title mb-3">4. Payment</h3>
                        <p class="card-tex text-light">
                            By entering into this agreement, the Renter acknowledges and agrees to assume responsibility
                            for all rental fees encompassing the rental rate, applicable taxes, fuel charges,
                            and any specified additional fees as outlined by the Company. Furthermore, the
                            Company reserves the right to request a security deposit at the commencement
                            of the rental period. This security deposit is intended to secure the Company's
                            interests and may be refunded upon the satisfactory return of the vehicle,
                            provided it is in good condition and the Renter has adhered to the terms and conditions laid out
                            in this Agreement.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
