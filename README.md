# CMPE332 Final Project
## Database Description
* The are multiple theatre complexes in the city. Each theatre complex contains some number of theatres and has a name, address and a phone number. Each theatre in a theatre complex has a theatre number, a maximum number of seats and a screen size (small, medium or large).  You must have at least 3 theatre complexes represented in your project.
* Each current movie has a title, a running time, a rating (G, PG, AA, 14A, R, etc), a plot synopsis, a list of main actors, a director, a production company, the name of the supplier and the start and end dates for the movie's run at the theatre complex. The movie has one or more daily showings at the theatre complex specified by a start time. Each showing has the number of the theatre for the showing, the start time and the number of seats still available. 
* A movie supplier has a company name, a company address, a phone number and the name of the contact person at the company.
Movie information remains in the database even if the movie is no longer playing at any theatres.
* Each OMTS customer must register with the service.  Once they have done so, they use the account number and password created to conduct transactions with the service. Each customer has a name, address, phone number, email address, account number, password, credit card number and credit card expiry date.
* Customers make reservations with the service (ie. they purchase movie tickets).   Each reservation contains an account number, a showing, the number of tickets reserved. Assume that reservation records will be retained in the database for later analysis of customer movie viewing patterns.
* Customer reviews for movies.

## Functional Requirements

The OMTS application supports 2 categories of functions - one for members and one for administrators.

### Members
* make an account including a login id and password
* browse movies playing at the various theatre complexes.
* purchase some number of tickets for one or more movies showing at one or more theatres
* view their purchases
* cancel a purchase
* update their personal details -- ie. modify their profile
* browse their past rentals.
add a review for a movie.

### Administrators
* list all the members
* remove a member
* add or update the information for a theatre complex/theatre
* add movies to the database
* update where/when movies are showing
for a particular customer, show their rental history (including current tickets held)
* find the movie that is the most popular (ie. has sold the most tickets across all theatres).
* find the theatre complex that is most popular (ie. has sold the most tickets across all movies)

# Contributors
* [Sean Lee](https://github.com/seanblee)
* [Darian Lio](https://github.com/darianlio)

