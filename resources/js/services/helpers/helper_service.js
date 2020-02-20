export function monthName(nbr) {
    if (parseInt(nbr) === 1) return 'Janvier';
    if (parseInt(nbr) === 2) return 'Février';
    if (parseInt(nbr) === 3) return 'Mars';
    if (parseInt(nbr) === 4) return 'Avril';
    if (parseInt(nbr) === 5) return 'Mai';
    if (parseInt(nbr) === 6) return 'Juin';
    if (parseInt(nbr) === 7) return 'Juillet';
    if (parseInt(nbr) === 8) return 'Août';
    if (parseInt(nbr) === 9) return 'Septembre';
    if (parseInt(nbr) === 10) return 'Octobre';
    if (parseInt(nbr) === 11) return 'Novembre';
    if (parseInt(nbr) === 12) return 'Décembre';
}

export function capitalize (s) {
    if (typeof s !== 'string') return '';
    return s.charAt(0).toUpperCase() + s.slice(1)
}

export  function getWeekRange(d) {
    d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
    d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
    const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    return Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
}

export function getWeeksInMonth(month, year){
    let weeks = [],
        firstDate = new Date(year, month, 1),
        lastDate = new Date(year, month + 1, 0),
        numDays = lastDate.getDate();

    let start = 1;
    let end = 7 - firstDate.getDay();
    while(start<=numDays){
        weeks.push({start:start,end:end});
        start = end + 1;
        end = end + 7;
        if(end>numDays)
            end=numDays;
    }
    return weeks;
}

/*export function diffHours2(startTime, endTime) {

    let first_split = startTime.split(':');
    let second_split = endTime.split(':');
    let hours;
    let minute;

    if (parseInt(first_split[0]) > parseInt(second_split[0]) && parseInt(first_split[1]) > parseInt(second_split[1])) {
        let h;
        let m;

        if (parseInt(second_split[0]) === 0) {
            hours = 24;
            if (parseInt(second_split[1]) < parseInt(first_split[1])) {
                let _hours = hours - 1;
                let _minute = parseInt(second_split[1]) + 60;

                hours = _hours - parseInt(first_split[0]);
                minute = _minute - parseInt(first_split[1]);
            } else {
                hours = 24 - parseInt(first_split[0]);
                minute = parseInt(first_split[1]) - parseInt(second_split[1]);
            }
        } else {
            hours = 24 - (parseInt(first_split[0]) - parseInt(second_split[0]));
            minute = parseInt(first_split[1]) - parseInt(second_split[1]);
        }

        hours < 10 ?  h = '0' + hours : h = hours;

        minute < 10 ? m = '0' + minute : m = minute;

        return h + 'H' + m
    }

    if (parseInt(first_split[0]) < parseInt(second_split[0]) && parseInt(first_split[1]) < parseInt(second_split[1])) {
        let _hours = '';
        let _minute = '';

        hours = parseInt(second_split[0]) - parseInt(first_split[0]);
        minute = parseInt(second_split[1]) - parseInt(first_split[1]);

        hours < 10 ? _hours = '0' + hours : _hours = hours;

        minute < 10 ? _minute = '0' + minute : _minute = minute;

        return _hours + 'H' + _minute;

    } else if (parseInt(second_split[0]) > parseInt(first_split[0])) {
        if (parseInt(second_split[1]) < parseInt(first_split[1])) {
            let final_hours = '';
            let final_min = '';

            let _hours = parseInt(second_split[0]) - 1;
            let _minute = parseInt(second_split[1]) + 60;

            hours = _hours - parseInt(first_split[0]);
            minute = _minute - parseInt(first_split[1]);

            hours < 10 ? final_hours = '0' + hours : final_hours = hours;

            minute < 10 ? final_min = '0' + minute : final_min = minute;

            return final_hours + 'H' + final_min;
        }

        if (parseInt(second_split[1]) === parseInt(first_split[1])) {
            let final_hours = '';
            hours = parseInt(second_split[0]) - parseInt(first_split[0]);

            hours < 10 ? final_hours = '0' + hours : final_hours = hours;

            return final_hours + 'H' + '00'
        }

    } else if (parseInt(first_split[0]) > parseInt(second_split[0])) {
        let first_hour_only_hour = parseInt(first_split[0]);
        let second_hour_only_hour = parseInt(second_split[0]);

        let first_hour_only_min = parseInt(first_split[1]);
        let second_hour_only_min = parseInt(second_split[1]);

        let tmp_hour = 24 - first_hour_only_hour;
        let tmp_ttl_hour = tmp_hour + second_hour_only_hour;
        let tmp_ttl_min = 0;


        if (first_hour_only_min > second_hour_only_min) {
            tmp_ttl_hour = tmp_ttl_hour - 1;
            tmp_ttl_min = (60 - first_hour_only_min) + second_hour_only_min;
        } else if (first_hour_only_min < second_hour_only_min) {
            tmp_ttl_min = second_hour_only_min - first_hour_only_min;
        } else if (first_hour_only_min === second_hour_only_min) {
            tmp_ttl_hour = tmp_ttl_hour;
        } else {
            tmp_ttl_min = first_hour_only_min + second_hour_only_min;
        }
        let tmp_new_hour = 0;
        let tmp_new_min_mod = 0;

        let _hours = '';
        let _min = '';

        if (tmp_ttl_min > 59) {
            tmp_new_hour = tmp_ttl_min / 60;
            tmp_new_min_mod = tmp_ttl_min % 60;

            tmp_ttl_hour += tmp_new_hour;
        } else {
            tmp_new_min_mod = tmp_ttl_min
        }

        tmp_ttl_hour < 10 ? _hours = '0' + tmp_ttl_hour : _hours = tmp_ttl_hour;

        tmp_new_min_mod < 10 ? _min = '0' + tmp_new_min_mod : _min = tmp_new_min_mod;

        return _hours + 'H' + _min
    } else if (parseInt(first_split[0]) === parseInt(second_split[0])) {
        hours = '00';
        let minute = 0;
        if (parseInt(first_split[1]) < parseInt(second_split[1])) {
            minute = parseInt(second_split[1]) - parseInt(first_split[1]);
        }

        if (minute < 10) {
            return hours + 'H0' + minute
        } else {
            return hours + 'H' + minute
        }
    } else if (parseInt(first_split[0]) === 0 && parseInt(first_split[1]) === 0) {
        hours = parseInt(second_split[0]);
        minute = parseInt(second_split[1]);

        if (hours === 0) {
            return '00H' + minute
        } else if (minute === 0) {
            if (hours < 10) {
                return '0' + hours + 'H00';
            } else {
                return hours + 'H00';
            }
        } else {
            let h;
            let m;

            hours < 10 ? h = '0' + hours : h = hours;

            minute < 10 ? m = '0' + minute : m = minute;

            return h + 'H' + m
        }
    }
}*/

export function filterUsersPresenceForConnectedUser (users, currentUser) {
    let filterUser;
    filterUser = [];

    if (users.length > 0) {
        users.map((user) => {
            if (currentUser.isAgent && currentUser.id !== user.id && !user.isAgent && !user.isClient) {
                filterUser.push(user)
            }else if (currentUser.isClient && currentUser.id !== user.id && !user.isAgent && !user.isClient) {
                filterUser.push(user)
            } else if (!currentUser.isAgent && !currentUser.isClient && currentUser.id !== user.id) {
                filterUser.push(user)
            }
        });

        return filterUser
    }

    return users
}

export function removeLeavingUser (user, onlineUsers) {
    for(let i = 0; i < onlineUsers.length; i++){
        if ( onlineUsers[i].id === user.id) {
            onlineUsers.splice(i, 1);
            i--;
        }
    }

    return onlineUsers
}

export function addJoiningUser (user, currentUser) {
    if (currentUser.isAgent && !user.isAgent && !user.isClient) {
        return user;
    }

    if (currentUser.isClient && !user.isAgent && !user.isClient) {
        return user;
    }

    if (currentUser.isAdmin) {
        return user;
    }
}
