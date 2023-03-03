CREATE TABLE prayer_times (
    city varchar(255) NOT NULL,
    fajr time NOT NULL,
    sunrise time NOT NULL,
    dhuhr time NOT NULL,
    asr time NOT NULL,
    maghrib time NOT NULL,
    isha time NOT NULL,
    PRIMARY KEY (city)
);
