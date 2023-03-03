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
INSERT INTO prayer_times (city, fajr, sunrise, dhuhr, asr, maghrib, isha)
VALUES ('Istanbul', '05:00', '06:00', '12:00', '15:00', '18:00', '19:00');
