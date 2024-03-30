<?php

class ToletModel {
    private $conn;
    private $tolet_id;
    private $location;
    private $address;
    private $city;
    private $compartment;
    private $rent_per_month;
    private $status;
    private $date_of_registration;
    private $water_units;
    private $status_toiletDoorLock;
    private $status_DoorLock;
    private $status_washinkSink;
    private $status_toiletSink;
    private $status_windows;
    private $status_paint;
    private $status_electricity;
    private $status_number_of_Bulbs;
    private $status_keyHolder;
    private $created_by;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function setToletId($tolet_id) {
        $this->tolet_id = $tolet_id;
    }

    public function getToletId() {
        return $this->tolet_id;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCompartment($compartment) {
        $this->compartment = $compartment;
    }

    public function getCompartment() {
        return $this->compartment;
    }

    public function setRentPerMonth($rent_per_month) {
        $this->rent_per_month = $rent_per_month;
    }

    public function getRentPerMonth() {
        return $this->rent_per_month;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setDateOfRegistration($date_of_registration) {
        $this->date_of_registration = $date_of_registration;
    }

    public function getDateOfRegistration() {
        return $this->date_of_registration;
    }

    public function setWaterUnits($water_units) {
        $this->water_units = $water_units;
    }

    public function getWaterUnits() {
        return $this->water_units;
    }

    public function setStatusToiletDoorLock($status_toiletDoorLock) {
        $this->status_toiletDoorLock = $status_toiletDoorLock;
    }

    public function getStatusToiletDoorLock() {
        return $this->status_toiletDoorLock;
    }

    public function setStatusDoorLock($status_DoorLock) {
        $this->status_DoorLock = $status_DoorLock;
    }

    public function getStatusDoorLock() {
        return $this->status_DoorLock;
    }

    public function setStatusWashinkSink($status_washinkSink) {
        $this->status_washinkSink = $status_washinkSink;
    }

    public function getStatusWashinkSink() {
        return $this->status_washinkSink;
    }

    public function setStatusToiletSink($status_toiletSink) {
        $this->status_toiletSink = $status_toiletSink;
    }

    public function getStatusToiletSink() {
        return $this->status_toiletSink;
    }

    public function setStatusWindows($status_windows) {
        $this->status_windows = $status_windows;
    }

    public function getStatusWindows() {
        return $this->status_windows;
    }

    public function setStatusPaint($status_paint) {
        $this->status_paint = $status_paint;
    }

    public function getStatusPaint() {
        return $this->status_paint;
    }

    public function setStatusElectricity($status_electricity) {
        $this->status_electricity = $status_electricity;
    }

    public function getStatusElectricity() {
        return $this->status_electricity;
    }

    public function setStatusNumberOfBulbs($status_number_of_Bulbs) {
        $this->status_number_of_Bulbs = $status_number_of_Bulbs;
    }

    public function getStatusNumberOfBulbs() {
        return $this->status_number_of_Bulbs;
    }

    public function setStatusKeyHolder($status_keyHolder) {
        $this->status_keyHolder = $status_keyHolder;
    }

    public function getStatusKeyHolder() {
        return $this->status_keyHolder;
    }

    public function setCreatedBy($created_by) {
        $this->created_by = $created_by;
    }

    public function getCreatedBy() {
        return $this->created_by;
    }


 
    public function createTolet() {
       
        $query = "INSERT INTO tolet (location, address, city, compartment, rent_per_month, status, date_of_registration, water_units, status_toiletDoorLock, status_DoorLock, status_washinkSink, status_toiletSink, status_windows, status_paint, status_electricity, status_number_of_Bulbs, status_keyHolder, created_by) VALUES ('$this->location', '$this->address', '$this->city', '$this->compartment', $this->rentPerMonth, '$this->status', '$this->dateOfRegistration', $this->waterUnits, '$this->statusToiletDoorLock', '$this->statusDoorLock', '$this->statusWashinkSink', '$this->statusToiletSink', '$this->statusWindows', '$this->statusPaint', '$this->statusElectricity', $this->statusNumberOfBulbs, '$this->statusKeyHolder', '$this->createdBy')";

        if ($this->conn->query($query) === TRUE) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getToletList() {
        $query = "SELECT * FROM tolet";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTolet($id){

    }

    public function getUserToletList($email){

    }

    public updateTolet($id) {

    }

}
?>
