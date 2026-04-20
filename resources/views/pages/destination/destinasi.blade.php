@extends('master')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #020617, #0f172a);
    color: #e2e8f0;
    font-family: 'Segoe UI', sans-serif;
}

/* CONTAINER */
.container-box {
    background: rgba(15,23,42,.7);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 35px;
    box-shadow: 0 30px 80px rgba(0,0,0,.7);
}

/* HERO */
.hero-modern {
    position: relative;
    border-radius: 25px;
    overflow: hidden;
    height: 360px;
    margin-bottom: 30px;
}

.hero-modern img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.8s ease;
}

.hero-modern:hover img {
    transform: scale(1.12);
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.9), transparent);
    display:flex;
    flex-direction:column;
    justify-content:flex-end;
    padding:30px;
}

.title {
    font-size: 2.4rem;
    font-weight: 700;
    letter-spacing: .5px;
}

.subtitle {
    color:#0f0f0f00;
}

/* BADGE */
.badge-type {
    display:inline-block;
    padding:6px 14px;
    border-radius:20px;
    font-size:.75rem;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(10px);
    margin-bottom:10px;
}

/* BUTTON */
.btn-main {
    background: linear-gradient(135deg,#22c55e,#4ade80);
    border:none;
    padding:10px 25px;
    border-radius:50px;
    font-weight:700;
    color:#000;
    transition:.3s;
}

.btn-main:hover {
    transform: scale(1.08);
    box-shadow: 0 0 20px #22c55e;
}

/* GRID */
.grid-layout {
    display:grid;
    grid-template-columns: repeat(2,1fr);
    gap:20px;
}

/* CARD */
.card-dark {
    background: linear-gradient(145deg, #020617, #020617);
    border-radius: 20px;
    padding: 22px;
    transition: 0.3s;
    border: 1px solid rgba(255,255,255,0.04);
}

.card-dark:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,.6);
}

/* INFO */
.info-row {
    display:flex;
    justify-content:space-between;
    padding:10px 0;
    border-bottom:1px solid rgba(255,255,255,0.05);
}

/* FASILITAS */
.facility-grid {
    display:grid;
    grid-template-columns: repeat(2,1fr);
    gap:10px;
}

.facility-item {
    background: #020617;
    padding: 10px;
    border-radius: 12px;
    text-align: center;
    transition: 0.3s;
}

.facility-item:hover {
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    transform: scale(1.05);
}

/* TYPE */
.type-grid {
    display:grid;
    grid-template-columns: repeat(3,1fr);
    gap:10px;
}

.type-item {
    background:#020617;
    padding:10px;
    border-radius:12px;
    text-align:center;
    cursor:pointer;
    transition:.3s;
}

.type-item:hover {
    background:#22c55e;
    color:black;
}

/* BOOKING */
.booking-box input {
    background:#020617;
    border:1px solid #1e293b;
    color:#fff;
    border-radius:10px;
}

/* SELECT */
select.form-select {
    background: rgba(255,255,255,0.08);
    border: none;
    color: #fff;
    border-radius: 10px;
}

/* MAP */
iframe {
    border-radius: 15px;
    border: none;
}
</style>
<div class="container mt-5 mb-5">
<div class="col-md-10 mx-auto container-box">

<!-- HERO -->
<div class="hero-modern">
    <img id="heroImage" src="https://wallpaperaccess.com/full/255999.jpg" alt="Hero Image">
    
    <div class="hero-overlay">
        <div class="badge-type" id="kategori">🌴 Wisata Alam</div>
        <div id="title" class="title">{{ $destinasi['nama'] }}</div>
        <div class="subtitle">Destinasi premium dengan pengalaman tak terlupakan</div>

        <select class="form-select mt-2" onchange="changeDest(this.value)">
            <option value="default">Pilih Destinasi</option>
            <option value="tokyo">Tokyo</option>
            <option value="london">London</option>
            <option value="canada">Canada</option>
            <option value="riau">Riau</option>
        </select>

        <button class="btn btn-main mt-2">Booking Sekarang</button>
    </div>
</div>

<!-- GRID -->
<div class="grid-layout">

<!-- INFO -->
<div class="card-dark">
    <h5>📋 Informasi Paket</h5>
    <div class="info-row"><span>💰 Harga</span><span id="harga">Rp {{ number_format($destinasi['harga'], 0, ',', '.') }}</span></div>
    <div class="info-row"><span>⏱️ Durasi</span><span id="durasi">{{ $destinasi['durasi'] }}</span></div>
    <div class="info-row"><span>✈️ Transportasi</span><span id="transportasi">{{ $destinasi['transportasi'] }}</span></div>
    <div class="info-row"><span>🏨 Hotel</span><span id="hotel">{{ $destinasi['hotel'] }}</span></div>
</div>

<!-- BOOKING -->
<div class="card-dark booking-box">
    <h5>📅 Booking</h5>
    <input type="date" class="form-control mb-2">
    <input type="number" class="form-control mb-2" placeholder="Jumlah Orang">
    <button class="btn btn-main w-100">Pesan Sekarang</button>
</div>

<!-- FASILITAS -->
<div class="card-dark">
    <h5>🎯 Fasilitas</h5>
    <div id="fasilitas" class="facility-grid">
        @foreach ($destinasi['fasilitas'] as $item)
            <div class="facility-item">{{ $item }}</div>
        @endforeach
    </div>
</div>

<!-- JENIS WISATA -->
<div class="card-dark">
    <h5>🌍 Jenis Wisata</h5>
    <div class="type-grid">
        <div class="type-item">🌴 Alam</div>
        <div class="type-item">🏙️ Kota</div>
        <div class="type-item">🏝️ Pantai</div>
        <div class="type-item">⛰️ Gunung</div>
        <div class="type-item">🏯 Budaya</div>
        <div class="type-item">🛍️ Belanja</div>
    </div>
</div>

<!-- MAP -->
<div class="card-dark">
    <h5>🗺️ Lokasi</h5>
    <iframe id="map" src="https://maps.google.com/maps?q={{ $destinasi['nama'] }}&output=embed" width="100%" height="200"></iframe>
</div>

</div>

</div>
</div>

<script>
const data = {
    tokyo:{
        nama:"Tokyo",
        gambar:"https://wallpapercave.com/wp/wp8438159.jpg",
        harga:"Rp 12.000.000",
        durasi:"5 Hari",
        transportasi:"Pesawat",
        hotel:"Tokyo Hotel",
        kategori:"🏙️ Kota",
        fasilitas:["Guide","Transport","Hotel"]
    },
    london:{
        nama:"London",
        gambar:"https://wallpaperaccess.com/full/32545.jpg",
        harga:"Rp 15.000.000",
        durasi:"6 Hari",
        transportasi:"Pesawat",
        hotel:"London Hotel",
        kategori:"🏯 Budaya",
        fasilitas:["Guide","Hotel"]
    },
    canada:{
        nama:"Canada",
        gambar:"https://wallpaperaccess.com/full/3084028.jpg",
        harga:"Rp 18.000.000",
        durasi:"7 Hari",
        transportasi:"Pesawat",
        hotel:"Canada Hotel",
        kategori:"🌲 Alam",
        fasilitas:["Guide","Transport","Hotel"]
    },
    riau:{
        nama:"Riau",
        gambar:"https://deih43ym53wif.cloudfront.net/fisabilillah-barelang-bridge-batam-indonesia-shutterstock_1482544481.jpg_2064957538.jpg",
        harga:"Rp 2.000.000",
        durasi:"3 Hari",
        transportasi:"Mobil",
        hotel:"Hotel Riau",
        kategori:"🏝️ Pantai",
        fasilitas:["Guide","Makan","Transport"]
    }
};

function changeDest(v){
    if(v==='default') return;
    let d=data[v];

    document.getElementById('heroImage').src=d.gambar;
    document.getElementById('title').innerText=d.nama;
    document.getElementById('harga').innerText=d.harga;
    document.getElementById('durasi').innerText=d.durasi;
    document.getElementById('transportasi').innerText=d.transportasi;
    document.getElementById('hotel').innerText=d.hotel;
    document.getElementById('kategori').innerText=d.kategori;

    let f='';
    d.fasilitas.forEach(x=>{f+=`<div class="facility-item">${x}</div>`});
    document.getElementById('fasilitas').innerHTML=f;

    document.getElementById('map').src=`https://maps.google.com/maps?q=${d.nama}&output=embed`;
}
</script>

@endsection