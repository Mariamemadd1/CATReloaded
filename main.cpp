#include <iostream>
#include <list>
using namespace std;
long long func(list<string> l) {
    long long num=0;
    for (string i:l) {
        if (i=="++") {
            num++;
        }
        else if (i=="--"){
            num--;
        }
    }
    return num;
}
int main() {
    list <string>lst={"++","++","--","++"};
    cout<<func(lst);
   return 0;
}