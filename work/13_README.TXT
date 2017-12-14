
       *** GRAPHER(tm) for Windows Release Notes ***

This file contains important information concerning GRAPHER
for Windows which was not available in time for the printed
documentation.

EXTRA FILES

   o  The files SAMPLE?.GRF and TERNARY.GRF are examples
      of some of GRAPHER's capabilities to use error bars, 
      best fits, data point labels, text annotation and 
      clip art.  SELECT.GRF is provided to give you practice
      selecting different objects with the "Ctrl+click" method.


INSTALLATION

   o  If the installation fails for some reason, the Setup
      program leaves a GSSETUP.LOG file in your Windows
      directory, which may contain information useful to
      your and/or our Tech Support staff in determining
      the cause of the problem.  If your installation fails 
      a temporary directory may remain on you hard disk. 
      The name of this directory is: ~WGSTP.T 
      If you need to you can remove it.

   o  If you install GRAPHER into a directory already
      containing GRAPHER for Windows, your GRAF4WIN.INI
      file will be automatically renamed to GRAF4WIN.BAK.
      If desired, you can manually replace all or part
      of the GRAF4WIN.INI file with portions of your old file.

   o  If you already have a GRAPHER icon in your "Golden
      Software" program group when you install GRAPHER,
      a second GRAPHER icon will be created instead of
      the first one being replaced.  Manually remove the
      first one by clicking it once to select it and then
      hitting the "Del" key to delete it.

   o  Changes to the WIN.INI include the addition of the following 
      two lines:
      [Golden Software]
      GRAPHER=C:\GRAF4WIN
      
      If you need to delete GRAPHER for Windows you can delete these
      two lines also.

   o  If you are using Windows 3.1 and are installing from 720Kb disks
      you will not need Disk 3.


NETWORK INFORMATION

   GRAPHER can be installed to operate on networked computers
in one of two ways:

   1. Locally on a workstation's hard drive for exclusive
      use by that workstation.  When Setup asks for a
      destination directory, choose one on a local hard drive.

   2. The GRAPHER program files can reside remotely on a
      file server network drive.

      The network administrator should first log onto the file
      server.  When Setup asks for a destination directory,
      choose one on the file server.  Setup will then ask if
      you want to install GRAPHER in the file server directory
      for exclusive use by this computer or for shared access.

      Exclusive use is just like stand-alone use, except the file
      server network drive is used instead of the workstation's
      local drive.  No other action is needed.  However, the
      workstation must be logged onto the file server before
      running GRAPHER.

      If shared access is chosen, Setup will copy all the GRAPHER
      files, plus the Setup program and its associated files to
      the file server drive.  When Setup has completed, the
      installation diskettes are no longer needed.  It is highly
      recommended the administrator now flag the server directory
      read-only.  From each workstation that will be running
      GRAPHER off the file server, someone must log onto the
      server, start Windows and run the copy of Setup (SETUP.EXE)
      that's in the server directory.  When Setup asks for a
      destination directory, choose one on a local hard drive.
      Setup then allows two types of workstation installation:

         a) GRAPHER can be installed on the workstation's local
            hard drive for stand-alone use later (user does not
            have to be logged onto the server).  This is just
            like item #1 above.  When Setup asks for a destin-
            ation directory, choose one on a local hard drive.

         b) A few small GRAPHER files are copied from the server
            to the workstation, while the bulk of the GRAPHER
            files stay on the server.  This allows many such
            workstations to share a single copy of GRAPHER
            without having the files duplicated on each computer.

      *** ATTENTION: Using GRAPHER on more than one computer
      *** requires appropriate network or multiuser licenses!

GOLDEN SOFTWARE TYPEFACES

   Users of Golden Software's DOS GRAPHER product will
   probably recognize these 24 typeface names that appear
   in the GRAPHER for Windows Text Dialog:

      GS SET1
      GS SET2
      GS SET3
      GS SET4
      GS SET5
      GS SET6
      GS SET7
      GS SET8
      GS SET9
      GS SET10
      GS SET11
      GS SET12
      GS SET13
      GS SET14
      GS SET15
      GS SET16
      GS SET1FS
      GS SET4FS
      GS SET6FS
      GS SET10FS
      GS SET11FS
      GS SET1INT
      GS SET10INT
      GS CENTERED

   They correspond EXACTLY to the 24 DOS GRAPHER Symbol Sets
   described in Appendix B of the DOS GRAPHER Reference Manual.
   They are stroked faces provided for the convenience of those
   who either have DOS GRAPHER files they wish to use unmodified
   with GRAPHER for Windows, or for ex-DOS GRAPHER users who want
   to continue working with them.

   There are three additional Golden Software Symbol faces:

      GS Helv
      GS Roman
      GS Symbol

   each of which contains all 256 characters defined in the
   standard Windows ANSI character set.  GS Roman is a serif
   face (analagous to Tms Rmn or Times), GS Helv is a san-serif
   face (analagous to Helv or Arial) and GS Symbol corresponds
   to the Windows (or Postscript) Symbol, which contains greek
   letters and various math symbols.  These faces are more
   useful to the user who doesn't care about DOS GRAPHER files
   or just needs a stroked face (maybe for use with plotters)
   that is laid-out like a "normal" Windows font.

   You may disable GRAPHER for Windows from using one or more
   of these faces by manually editing the GRAF4WIN.INI file and
   placing a semi-colon (;) at the beginning of the line
   containing the face's name. You will need to restart GRAPHER
   for the change to take effect.  They can be enabled later by
   just removing the semi-colon.

   *** IMPORTANT: If you are running Windows 3.0 and don't have
   *** any Adobe Type Manager (ATM) typefaces active, the only
   *** faces you have to work with are the GS faces.  If only
   *** GS faces appear in the Text Dialog, don't disable them
   *** all! Have at least GS Helv, Roman and Symbol enabled.

   To see what characters are available in a given typeface,
   along with the keyboard combinations to generate them, open
   the file CHARSET.GRF from within GRAPHER.  To see the
   complete character set for a specific typeface:

      a) Choose Select All from the Edit menu.

      b) Choose Text Attributes... from the Set menu.

      c) Select the typeface you want from the list box.
         Click OK.

NOTE TO ADOBE TYPE MANAGER USERS

   GRAPHER will automatically access ATM faces if you have ATM
version 1.5 or later.

   If you observe characters squeezed together or overlapping,
especially when very small, then look in the "[Synonyms]" section
of the ATM.INI file (kept in your Windows directory) and see if
the typeface you are using appears in the list.  If so, ATM is
substituting a Windows screen font at small sizes.  GRAPHER needs
scalable typefaces.  Placing a semi-colon (;) at the front of
the line disables ATM from making the substitution.  You will have
to restart Windows for ATM to recognize the change.  Your other
apps should still work fine with ATM.  If you ever need to enable
the substitution again, just delete the semi-colon.

CONVERTING DOS GRAPHER FILES

   Setup copies a utility program (CONVERT.EXE) into the GRAPHER
installation directory which will convert many DOS GRAPHER .GRF
files to GRAPHER for Windows compatible files.  The setup program
will add this icon to your Golden Software program group.

   Use of CONVERT is straightforward.  Select one or more DOS
GRAPHER files from the list box and click the "Convert" button to
convert them to GRAPHER for Windows format files.  Since GRAPHER
for Windows files also have the extension .GRF, CONVERT creates
converted files with the .GR1 extension.  We recommend copying
the .GR1 files into a separate directory (such as your GRAPHER
for Windows directory), and rename them to have .GRF extensions.
This can be accomplished using Windows File Manager.

   The converted files can be opened and further manipulated
using GRAPHER for Windows, quickly enhancing them with better
looking typefaces, etc.  We suggest keeping your DOS GRAPHER
files around until you are satisfied with your new graphs.

KNOWN BUGS AND DEFICIENCIES

    1) Dotted line thicknesses.  If you choose a dotted line that
    is 0.02 inches wide it will not print as a dotted line. This 
    is a Windows limitation, not a GRAPHER limitation.

    2) On some 80286 machines and 80386SX's running Windows 3.0
    there is an error that occurs at the end of the setup stating
    that the setup failed and that "Unable to add Group Golden Software"
    and or Setup message "Unable to create item in Program Manager Group:
    'Golden Software', Item: 'Grapher,,,,,C:\GRAF4WIN\'.
    The work around for this is to click on the Golden Software group and 
    add the icons manually. To do this choose Alt, F, New... and select
    program item.  Specify the title for the icon and put in the command
    line section type the path to the GRAF4WIN.EXE.  Usually C:\GRAF4WIN.
    i.e. 'C:\GRAF4WIN\GRAF4WIN.EXE'.  Choose OK and the GRAF4WIN icon
    should appear. To add the CONVERT icon use the same steps, however, 
    use CONVERT.EXE instead of GRAF4WIN.EXE. You can read the README.TXT 
    file using any wordprocessor or ASCII text editor.

HOW TO GET IN TOUCH WITH US

    1) Write to us at:
         GOLDEN SOFTWARE, INC.
         809 14TH Street
         Golden, CO 80401-1866 USA

    2) Phone or fax us at:
         303-279-1021  phone
         303-279-0909  fax

    3) Electronically at:
         303-279-0910  BBS at upto 9600 Baud N,8,1
