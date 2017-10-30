class Book
{
  constructor(ID, name)
  {
    this.bookID = ID;
    this.bookName = name;
    check_in();
  }

  check_in()
  {
    this.borrowedBy = null;
    this.availability = 1;
  }

  check_out(borrower)
  {
    this.borrowedBy = borrower;
    this.availability = 0;
  }
}

class Shelf
{

}

class Library
{
  
}
