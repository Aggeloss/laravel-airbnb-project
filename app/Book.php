<?php

namespace App;

class Book {

  private $totalBookings = 0;
  private $date;
  private $price = 0;
  private $checkIn = false;
  private $rooms;
  private $count;
  private $id;

  public function __construct($newBook, $id) {
    if($newBook) {
      $this->totalBookings = $newBook->totalBookings;
      $this->date[] = $newBook->date[$id];
      $this->price = $newBook->price;
      $this->checkIn = $newBook->checkIn;
      $this->rooms = $newBook->rooms;
    }
    $this->count++;
  }

  public function add($item, $id) {

    $storedBooks = ['quantity' => 0,
                    'date'     => $item->date,
                    'price'    => $item->price,
                    'state'    => $item->checkIn,
                    'item'     => $item];

    if($this->rooms) {
      if(checkDates($item->date)) {
        if(!array_key_exists($id, $this->rooms)) {
          $storedBooks['quantity']++;
          $this->rooms[$id] = $storedBooks;
        }
      }
    } else {
        $storedBooks['quantity']++;
        $this->rooms[$id] = $storedBooks;
    }
    return $this;
  }

  public function checkDates($date) {
    if(!in_array($date, $datesOfEachBook)) {
      $datesOfEachBook[$this->count] = $item->date;
      return true;
    } else {
      return false;
    }
    return false;
  }

  public function checkIn($id) {
    if($this->rooms)
      $this->rooms[$id]['state'] = true;
    return $this;
  }

  public function checkOut($id) {
    if($this->rooms && $this->rooms[$id]['state'] == true)
      $this->rooms[$id]['state'] = false;
    return $this;
  }

  public static $datesOfEachBook;
}
